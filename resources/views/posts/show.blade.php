@extends('layouts.app')

@section('title') Index @endsection
@section('content')


<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="card-title">Title:- {{$post->title}}</h5>
        <h6 class="card-title">Description:- </h6>
        <p class="card-text">{{$post-> description}}</p>
        <a href="{{route('posts.index')}}" class="btn btn-primary">All Posts</a>
    </div>
</div>

<div class="card mt-5">
    <h5 class="card-header">Post Creator Info</h5>
    <div class="card-body">
        <h6 class="card-title">Name: {{$post->user ? $post->user->name : 'user not found'}}</h6>
        <h6 class="card-title">Email: {{$post->user ? $post->user->email : 'email not found'}}</h6>
        <h6 class="card-title">Created at: {{$post->created_at->format('l jS \\of F Y h:i:s A')}}</h6>
    </div>
</div>

@endsection
