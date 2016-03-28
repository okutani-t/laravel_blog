@extends('layouts.default')

@section('title', 'Add New')

@section('content')
<h1>
    <a href="{{ asset('/') }}" class="pull-right fs12">Back</a>
    Add New
</h1>
<form action="{{ url('/posts') }}" method="post" class="form-group">
    {{ csrf_field() }}
    <p>
        <input type="text" class="form-control" name="title" placeholder="title" value="{{ old('title') }}">
        @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
        @endif
    </p>
    <p>
        <textarea name="body" class="form-control" rows="8" cols="40" placeholder="body">{{ old('body') }}</textarea>
        @if ($errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
        @endif
    </p>
    <p>
        <textarea name="summary" class="form-control" rows="2" cols="40" placeholder="summary">{{ old('summary') }}</textarea>
        @if ($errors->has('summary'))
            <span class="error">{{ $errors->first('summary') }}</span>
        @endif
    </p>
    <p>
        <input type="submit" class="btn btn-primary" value="Add New">
    </p>
</form>
@endsection
