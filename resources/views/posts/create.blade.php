@extends('layouts.default')

@section('title', 'Add New')

@section('content')
  <h1>
    <a href="{{ asset('/') }}" class="pull-right fs12">Back</a>
    Add New
  </h1>
  {!! Form::open(['url' => '/posts', 'class' => "form-group"]) !!}
  <p>
    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'title']) !!}
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p>
    {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'placeholder' => 'body', 'size' => '40x8']) !!}
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    {!! Form::textarea('summary', old('summary'), ['class' => 'form-control', 'placeholder' => 'summary', 'size' => '40x2']) !!}
    @if ($errors->has('summary'))
    <span class="error">{{ $errors->first('summary') }}</span>
    @endif
  </p>
  <p>
    {!! Form::submit('Add New', ['class' => 'btn btn-primary']) !!}
  </p>
  {!! Form::close() !!}
@endsection
