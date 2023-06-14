@extends('layout')

@section('banner')
  <h1>My blog</h1>
@endsection

@section('content')

  @if($posts)
    @foreach ($posts as $post)
        <article>
          <h2> {{ $post->title }} </h2>
        <p> {{ $post->body }} </p>
        <div class="post-meta">Published on {{$post->created_at}}</div>
        <span>By <a href="/authors/{{$post->author->username}}">
          {{$post->author->name}}</a> in </span>  <a href="/categories/{{$post->category->name}}">{{ $post->category->name }}</a>
        </article>
      @endforeach
  @endif

@endsection