@extends('layouts.layout')

@section('content')
  <div class="card">
    <div class="card-header text-white">{{ $post->title }}</div>
    <div class="card-body">
    <h5 class="card-title text-white"><a href="{{ $post->url }}" target="_blank">{{ $post->url }}</a></h5>
      <p class="card-text">{{ $post->description }}</p>
    </div>
    <div class="card-footer">
    <a class="text-white" href='https://twitter.com/{{ $post->user }}' target="_blank">@ {{ $post->user }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span class="text-white">{{ $post->created_at }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="btn btn-primary btn-sm" href="{!! action('postsController@edit', ['post_id' => $post->id]) !!}">編集する</a>
    </div>
  </div>

  <hr>
  <p class="comment-counter">コメントは{{ count($comments) }}件です。</p>
  @if(count($comments) > 0)
    @foreach($comments as $comment)
      <div class="card">
        <div class="card-body">
          <p class="card-text">{{ $comment->comment }}</p>
        </div>
        <div class="card-footer">
        <a class="text-white" href='https://twitter.com/{{ $comment->user }}'>@ {{ $comment->user }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span class="text-white">{{ $comment->created_at }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a class="btn btn-primary btn-sm" href="{!! action('commentsController@edit', ['post_id' => $post->id, 'comment_id' => $comment->id]) !!}">編集する</a>
        </div>
      </div>
    @endforeach
  @endif
  <a class="btn btn-success btn-lg" href="{!! action('commentsController@create', ['post_id' => $post->id]) !!}">コメントする</a>

@endsection
