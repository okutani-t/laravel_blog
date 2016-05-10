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
{!! Form::open(['url' => ['/posts', $post->id], 'class' => "form-group",]) !!}
  {{ method_field('patch') }}
  <p>
    {!! Form::text('title', old('title', $post->title), ['class' => 'form-control', 'placeholder' => 'title']) !!}
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p>

    {!! Form::textarea('body', old('body', $post->body), ['class' => 'form-control', 'placeholder' => 'body', 'size' => '40x8']) !!}
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    {!! Form::textarea('summary', old('summary', $post->summary), ['class' => 'form-control', 'placeholder' => 'summary', 'size' => '40x2']) !!}
    @if ($errors->has('summary'))
    <span class="error">{{ $errors->first('summary') }}</span>
    @endif
  </p>
  <p>
    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
  </p>
  {!! Form::close() !!}
@endsection
