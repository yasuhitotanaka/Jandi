@extends('layouts.layout')

@section('content')

<h3>投稿アイテムを修正します</h3>

{!! Form::open(['class' => 'form', 'action' => ['postsController@update', $post->id], 'method' => 'POST']) !!}
  {{ csrf_field() }}
  <div class="form-group">
    {{ Form::label('title', 'タイトル') }}
    {{ Form::text('title', $post->title, ['class' => 'form-control']), '', ['placeholder' => 'タイトルをいれてね'] }}
  </div>
  <div class="form-group">
    {{ Form::label('url', 'URL') }}
    {{ Form::text('url', $post->url, ['class' => 'form-control']), '', ['placeholder' => 'URLをいれてね'] }}
  </div>

  <div class="form-group">
    {{ Form::label('description', '見てほしいところ') }}
    {{ Form::textarea('description', $post->description, ['class' => 'form-control']), '', ['placeholder' => 'Photo Description'] }}
  </div>

  <div class="form-group">
    {{ Form::label('user', 'ユーザー名') }}
    {{ Form::text('user', $post->user, ['class' => 'form-control']), '', ['placeholder' => 'ユーザー名をいれてね'] }}
  </div>

  {{ Form::submit('更新する', ['class' => 'btn btn-success']) }}
{!! Form::close() !!}
@endsection
