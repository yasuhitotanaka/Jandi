@extends('layouts.layout')

@section('content')

<h3>コメントを修正します</h3>

<h3><a href="{!! action('postsController@show', ['post_id' => $post_id]) !!}">{{ $post_title }}</a></h3>

{!! Form::open(['class' => 'form', 'action' => ['commentsController@update', $post_id, $comment->id], 'method' => 'POST']) !!}
  {{ csrf_field() }}
  <div class="form-group">
    {{ Form::label('comment', 'コメント') }}
    {{ Form::textarea('comment', $comment->comment, ['class' => 'form-control']), '', ['placeholder' => 'Photo Description'] }}
  </div>
  <div class="form-group">
    {{ Form::label('user', 'ユーザー名') }}
    {{ Form::text('user', $comment->user, ['class' => 'form-control']), '', ['placeholder' => 'ユーザー名をいれてね'] }}
  </div>
  {{ Form::submit('更新する', ['class' => 'btn btn-success']) }}
{!! Form::close() !!}
@endsection
