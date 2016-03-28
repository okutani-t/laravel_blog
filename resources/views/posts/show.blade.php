@extends('layouts.default')

@section('title', 'Blog Detail')

@section('content')
<h1>{{ $post->title }}
<a href="{{asset('/')}}" class="pull-right fs12">Back</a>
</h1>
<div class="clearfix"></div>
<blockquote>
    {!! nl2br(e($post->summary)) !!}
</blockquote>
<p>
    {!! nl2br($post->body) !!}
</p>

<h2>Comments</h2>

<ul>
    @forelse ($post->comments as $comment)
        <li>
            {{ $comment->body }}
            <form action="{{ action('CommentsController@destroy', [$post->id,
                 $comment->id]) }}" id="form_{{ $comment->id }}" method="post" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <a href="#" data-id="{{ $comment->id }}" onclick="deleteComment(this)" class="fs12">[x]</a>
            </form>
        </li>
    @empty
        <li>No comment yet</li>
    @endforelse
</ul>

<h2>コメントをどうぞ</h2>

<form action="{{ action('CommentsController@store', $post->id) }}" method="post" class="form-group">
    {{ csrf_field() }}
    <p>
        <input type="text" name="body" class="form-control" placeholder="comment" value="{{ old('body') }}">
        @if ($errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
        @endif
    </p>
    <p>
        <input type="submit" value="Add Comment" class="btn btn-success">
    </p>
</form>

<script>
    function deleteComment(e) {
        'use strict';

        if (confirm('are you sure?')) {
            document.getElementById('form_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
