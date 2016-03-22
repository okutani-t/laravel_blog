<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    public function index() {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest('created_at')->get();
        // dd($posts->toArray());

        return view('posts.index', compact('posts'));
    }
}
