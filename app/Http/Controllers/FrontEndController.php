<?php

namespace App\Http\Controllers;

use App\Post;
use App\Contact;
use App\Category;
use App\Tag;
use Session;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();

        $firstPosts2 = $posts->splice(0,2);
        $middlePost1 = $posts->splice(0,1);
        $lastPosts = $posts->splice(0,2);


        $footerPosts = $posts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();

        $firstFooterPost = $posts->splice(0,1);
        $firstFooterPost2 = $posts->splice(0,2);
        $lastFooterPost = $posts->splice(0,1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['posts', 'recentPosts', 'firstPosts2', 'middlePost1', 'lastPosts', 'firstFooterPost', 'firstFooterPost2', 'lastFooterPost']));
    }

    public function about()
    {
        return view('website.about');
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $posts = Post::where('category_id', $category->id)->with('user')->paginate(9);

            return view('website.category', compact(['category', 'posts']));
        } else {
            return redirect()->route('website');
        }
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts =  Post::with('category', 'user')->inRandomOrder()->limit(3)->get();

        $categories = Category::all();
        $tags = Tag::all();

        if($post) {
            return view('website.post', compact(['post', 'posts', 'categories', 'tags']));
        } else {
            return redirect('/');
        }
    }

    public function send_message(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:255',
            'message' => 'required|min:100',
        ]);

        $contact = Contact::create($request->all());

        Session::flash('message-success', 'Contact message send successfully');
        return redirect()->back();
    }
}


