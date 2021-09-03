<?php

namespace App\Http\Controllers;

use App\Post;
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

    public function category()
    {
        return view('website.category');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();

        if($post) {
            return view('website.post', compact('post'));
        } else {
            return redirect('/');
        }
    }
}


