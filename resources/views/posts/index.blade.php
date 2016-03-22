@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h1>Posts</h1>
<ul>
    @forelse ($posts as $post)
        <li><a href="#">{{ $post['title'] }}</a></li>
    @empty
        <li>No posts yet</li>
    @endforelse
</ul>
@endsection
