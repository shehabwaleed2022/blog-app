@extends('layout')

@section('banner')
  <h1>My blog</h1>
@endsection
@section('content')

  @if($posts)
    @foreach ($posts as $post)
        {!! $post !!}
    @endforeach
  @endif

@endsection