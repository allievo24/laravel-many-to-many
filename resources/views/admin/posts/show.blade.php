@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
        <span class="fw-bold">Title:</span>
        {{$post->title}}
    </div>
    <div>
      <span class="fw-bold">Slug:</span>
      {{$post->slag}}
  </div>
    <div>
        <span class="fw-bold">Content:</span>
        {{$post->content}}
    </div>
    <div>
      <span class="fw-bold">Category:</span>
      {{($post->category)?$post->category->name:"-"}}
  </div>
    
    
    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna Indietro</a>

  </div>
    
@endsection