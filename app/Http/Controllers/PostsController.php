<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Requests\PostRequest;

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

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/')->with('flash_message', 'Post Deleted!');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(PostRequest $request) {
        $post = new Post($request->all());
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->summary = $request->summary;
        $post->save();
        return redirect('/')->with('flash_message', 'Post Added!');
    }

    public function update(PostRequest $request, $id) {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->summary = $request->summary;
        // $post->save();
        return redirect('/')->with('flash_message', 'Post Updated!');
    }


}
