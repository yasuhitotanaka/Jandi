@extends('layouts.layout')

@section('content')
  <button type="button" class="btn btn-success">
    <a href="{!! action('postsController@create') !!}">投稿する</a>
  </button>

  <div class="">
    現在の投稿数は{{ count($posts) }}件です。
  </div>

  @if(count($posts) > 0)
  @foreach($posts as $post)
  <div class="card">
    <div class="card-header">
      {{ $post->title }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $post->url }}</h5>
      <p class="card-text">{{ $post->description }}</p>
    </div>
    <div class="card-footer">
      {{ $post->user }}
    </div>
  </div>
  @endforeach
  @endif

@endsection
