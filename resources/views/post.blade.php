@extends('layout')

@section('banner')
  <h1>My blog</h1>
@endsction

@section('content')
      <article>
       <h2> {{$post->title }} </h2>
       <p> {{ $post->body }} </p>
         <div class="post-meta">Published on {{$post->created_at}}</div>
        </article>
@endsection

