@extends('layouts.app')

@section('title') create @endsection
@section('content')
        <form method="POST" action="{{route('posts.store')}}">
          @csrf
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input name="title" type="text" class="form-control">
            </div>

            <div class="mb-3 ">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
                <!-- <input type="text" class="form-control" > -->
            </div>

            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
          </form>

@endsection
