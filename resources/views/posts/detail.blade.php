@extends('layouts.layout')

@section('content')
  <div class="card">
    <div class="card-header">
      {{ $post->title }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $post->url }}</h5>
      <p class="card-text">{{ $post->description }}</p>
    </div>
    <div class="card-footer">
      {{ $post->user }}  {{ $post->created_at }}
    </div>
  </div>

  <hr>
  <p>コメントは{{ count($comments) }}件です。</p>
  @if(count($comments) > 0)
    @foreach($comments as $comment)
      <div class="card">
        <div class="card-body">
          <p class="card-text">{{ $comment->comment }}</p>
        </div>
        <div class="card-footer">
          {{ $comment->user }}  {{ $comment->created_at }}
              <a class="btn btn-success" href="{!! action('commentsController@edit', ['post_id' => $post->id, 'comment_id' => $comment->id]) !!}">編集する</a>
        </div>
      </div>
    @endforeach
  @endif
  <a class="btn btn-success" href="{!! action('commentsController@create', ['post_id' => $post->id]) !!}">コメントする。</a>

@endsection
