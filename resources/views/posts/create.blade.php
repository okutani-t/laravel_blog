@extends('layouts.default')

@section('title', 'Add New')

@section('content')
<h1>
    <a href="{{ asset('/') }}" class="pull-right fs12">Back</a>
    Add New
</h1>
<form action="{{ url('/posts') }}" method="post">
    {{ csrf_field() }}
    <p>
        <input type="text" name="title" placeholder="title">
    </p>
    <p>
        <textarea name="body" rows="8" cols="40" placeholder="body"></textarea>
    </p>
    <p>
        <textarea name="summary" rows="2" cols="40" placeholder="summary"></textarea>
    </p>
    <p>
        <input type="submit" value="Add New">
    </p>
</form>
@endsection
