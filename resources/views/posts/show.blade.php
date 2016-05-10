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

    {!! Form::open([
      'url' => "posts/{$post->id}/comments/{$comment->id}",
      'id'     => "form_" . $comment->id,
      'style'  => "display: inline",
      'method' => 'delete'
      ]) !!}

      {{ method_field('delete') }}
      <a href="#" data-id="{{ $comment->id }}" onclick="deleteComment(this)" class="fs12">[x]</a>
    {!! Form::close() !!}
  </li>
  @empty
  <li>No comment yet</li>
  @endforelse
</ul>

<h2>コメントをどうぞ</h2>

{!! Form::open([
  'action' => ['CommentsController@store', $post->id],
  'class'  => "form-group"
  ]) !!}

  <p>
    {!! Form::text('body', old('title'), ['class' => 'form-control', 'placeholder' => 'comment']) !!}
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    {!! Form::submit('Add Comment', ['class' => 'btn btn-success']) !!}
  </p>
{!! Form::close() !!}

<script>
function deleteComment(e) {
  'use strict';

  if (confirm('are you sure?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>

@endsection
