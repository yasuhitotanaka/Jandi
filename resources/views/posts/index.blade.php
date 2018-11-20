@extends('layouts.layout')

@section('content')
  <p>気軽に天鳳の牌譜を投稿して、意見をもらえるサービスです。<br>知り合いを増やしたり、意見交換の場にどうぞ。</p>
  <button type="button" class="btn btn-success btn-lg">
      <a class="text-white" href="{!! action('postsController@create') !!}">投稿する</a>
  </button>
  <hr>
  <p class="post-counter">
      現在の投稿数は{{ count($posts) }}件です。
  </p>
  @if(count($posts) > 0)
    @foreach($posts as $post)
    <div class="card">
      <div class="card-header">
        <a class="text-white" href="{!! action('postsController@show', ['id' => $post->id]) !!}">{{ $post->title }}</a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-blue"><a href="{{ $post->url }}">{{ $post->url }}</a></h5>
        <p class="card-text">{{ $post->description }}</p>
      </div>
      <div class="card-footer">
        <a class="text-white" href='https://twitter.com/{{ $post->user }}'>@ {{ $post->user }}</a>
      </div>
    </div>
    @endforeach
  @endif
@endsection
