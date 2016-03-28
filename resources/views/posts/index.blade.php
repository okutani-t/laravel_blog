@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h1>
    <a href="{{ url('/posts/create') }}" class="pull-right fs12">Add New</a>
    Posts
</h1>
<ul class="series_list">
    @forelse ($posts as $post)
        {{--
        <li>
            <a href="{{ action('PostsController@show', $post->id) }}">{{ $post['title'] }}</a>
        </li>
        --}}
        <li>
            <a href="{{ url('/posts', $post->id) }}">{{ $post['title'] }}</a>
            <a href="{{ action('PostsController@edit', $post->id) }}" class="fs12">[編集]</a>
            <form class="" action="{{ action('PostsController@destroy', $post->id) }}" id="form_{{ $post->id }}" method="post" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this)" class="fs12">[x]</a>
            </form>
        </li>
    @empty
        <li>No posts yet</li>
    @endforelse
</ul>

<script>
    function deletePost(e) {
        'use strict';

        if (confirm('削除しますか?')) {
            document.getElementById('form_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
