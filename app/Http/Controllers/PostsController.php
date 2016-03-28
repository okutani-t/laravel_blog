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

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->summary = $request->summary;
        $post->save();
        return redirect('/')->with('flash_message', 'Post Added!');
    }

}
