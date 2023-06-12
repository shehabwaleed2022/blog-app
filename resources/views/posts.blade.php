@extends('layout')

@section('banner')
  <h1>My blog</h1>
@end sction
@section('content')

  @if($posts)
    @foreach ($posts as $post)
        <article>
          <h2> {{ $post->title }} </h2>
        <p> {{ $post->body }} </p>
        <div class="post-meta">Published on {{$post->created_at}}</div>
        <a href="#">{{ $post->category->name }}</a>
        </article>
      @endforeach
  @endif

@endsection