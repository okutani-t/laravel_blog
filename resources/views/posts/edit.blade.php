@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
<h1>
    <a href="{{ asset('/') }}" class="pull-right fs12">Back</a>
    編集
</h1>

<h2>
    記事を編集！
</h2>

<form action="{{ url('/posts', $post->id) }}" method="post" class="form-group">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <p>
        <input type="text" class="form-control" name="title" placeholder="title" value="{{ old('title', $post->title) }}">
        @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
        @endif
    </p>
    <p>
        <textarea name="body" class="form-control" rows="8" cols="40" placeholder="body">{{ old('body', $post->body) }}</textarea>
        @if ($errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
        @endif
    </p>
    <p>
        <textarea name="summary" class="form-control" rows="2" cols="40" placeholder="summary">{{ old('summary', $post->summary) }}</textarea>
        @if ($errors->has('summary'))
            <span class="error">{{ $errors->first('summary') }}</span>
        @endif
    </p>
    <p>
        <input type="submit" value="Update" class="btn btn-success">
    </p>
</form>
@endsection
