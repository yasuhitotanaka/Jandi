@extends('layouts.layout')

@section('content')
  <button type="button" class="btn btn-success">
    <a href="{!! action('postsController@create') !!}">投稿する</a>
  </button>

  <div class="">
    現在の投稿数は<?php echo count($posts); ?>件です。
  </div>

  @if(count($posts) == 0)
  <div class="card">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  @endif

@endsection
