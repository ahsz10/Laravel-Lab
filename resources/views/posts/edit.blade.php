@extends('layouts.app')

@section('title') create @endsection
@section('content')
        <form method="POST" action="{{route('posts.update',$post['id'])}}">
          @csrf
          @method('PUT')
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input name="title" type="text" value="{{$post->title}}" class="form-control">
            </div>

            <div class="mb-3 ">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"> {{$post->description}} </textarea>
                <!-- <input type="text" class="form-control" > -->
              </div>

              <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="user_id" value="{{$post->id}}"class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @endif>{{$user->name}}</option>
                    @endforeach
                </select>
              </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>

@endsection
