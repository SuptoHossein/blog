<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact(['posts', 'tags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd("ok");

        // validation
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required'
        ]);

        // post save to db
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        $post->tags()->attach($request->tag);

        // image upload
        if ($request->has('image')) {
            $image = $request->image;
            $imageNewName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $imageNewName);
            // $post->image = '/storage/post/' . $imageNewName; // dose not working....
            $post->image = $imageNewName;
            $post->save();
        }

        Session::flash('success', 'Post Created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title,$post->id",
            'image' => 'sometimes|image',
            'description' => 'required',
            'category' => 'required'
        ]);


        // post update
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category;

        $post->tags()->sync($request->tag);

        // image upload
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageNewName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $imageNewName);
            // $post->image = '/storage/post/' . $imageNewName; // dose not working....
            $post->image = $imageNewName;
        }

        $post->save();

        Session::flash('success', 'Post Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            if (file_exists(public_path('/storage/post/' . $post->image))) {
                unlink(public_path('/storage/post/'. $post->image));
            }

            $post->delete();
            Session::flash('success', 'Post Deleted');

        }
        return redirect()->back();
    }
}
