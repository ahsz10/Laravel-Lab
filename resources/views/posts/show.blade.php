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

<div class="card mt-5">
    <h5 class="card-header">Comments</h5>
    <div class="card-body">
        <div class="text-center mt-4 my-2">
            <form style="display:inline;" action="{{route('posts.comment.store',$post['id'])}}" method="POST" class="d-flex">
                @csrf
                <label class="form-label col-sm-2 col-form-label">Add Comment</label>
                <!-- <input name="body" type="text" class="form-control w-50"> -->
                <textarea name="body" class="form-control w-50"></textarea>
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </form>
        </div>
        {{--<div class="mt-4">
            <table class="table mt-2">
                <!-- <caption> Comments </caption> -->
                <!-- <h4 class="mx-auto">Comments</h4> -->
                <thead>
                    <th class="col">Comment</th>
                    <th class="col">Date</th>
                    <!-- <th class="col">Action</th> -->
                </thead>
                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{$comment->body}}</td>
                        <td>{{$comment->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a href="#"><x-button class='secondary' message='Edit'></x-button></a>
                            <form style="display:inline;" method="POST" action="{{route('posts.comment.destroy', $post['id'])}}">
                            @csrf
                            @method('DELETE')
                                <x-button class='danger' message='Delete' ></x-button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>--}}

        @foreach ($post->comments as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <h5 class="card-title">{{$comment->body}}</h5>
                <p class="card-text">posted at {{$comment->created_at->format('Y-m-d')}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection
