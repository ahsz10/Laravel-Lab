@extends('layouts.app')

@section('title') Index @endsection
@section('content')


<div class="card">
  <h5 class="card-header">Post</h5>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post['title']}}</h5>
    <p class="card-text">Posted by {{$post['posted_by']}}</p>
    <p class="card-text">Published {{$post['creation_date']}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">All Posts</a>
</div>
</div>

@endsection
