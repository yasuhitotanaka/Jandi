@extends('layouts.layout')

@section('content')

<h3>投稿アイテムを作成します</h3>

{!! Form::open(['class' => 'form', 'action' => 'postsController@store', 'method' => 'POST']) !!}
  {{ csrf_field() }}
  <div class="form-group">
    {{ Form::label('title', 'タイトル') }}
    {{ Form::text('title', '', ['class' => 'form-control']), '', ['placeholder' => 'タイトルをいれてね'] }}
  </div>
  <div class="form-group">
    {{ Form::label('title', 'URL') }}
    {{ Form::text('url', '', ['class' => 'form-control']), '', ['placeholder' => 'URLをいれてね'] }}
  </div>

  <div class="form-group">
    {{ Form::label('title', '見てほしいところ') }}
    {{ Form::textarea('description', '', ['class' => 'form-control']), '', ['placeholder' => 'Photo Description'] }}
  </div>

  <div class="form-group">
    {{ Form::label('title', '投稿者のTwitterアカウント(@以降)') }}
    {{ Form::text('user', '', ['class' => 'form-control']), '', ['placeholder' => 'ユーザー名をいれてね'] }}
  </div>

  {{ Form::submit('作成する', ['class' => 'btn btn-success btn-lg']) }}
{!! Form::close() !!}
@endsection
