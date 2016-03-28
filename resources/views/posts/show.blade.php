@extends('layouts.default')

@section('title', 'Blog Detail')

@section('content')
<h1>{{ $post->title }}</h1>
<a href="{{asset('/')}}" class="pull-right fs12">Back</a>
<blockquote>
    {!! nl2br(e($post->summary)) !!}
</blockquote>
<p>
    {!! nl2br(e($post->body)) !!}
</p>
@endsection
