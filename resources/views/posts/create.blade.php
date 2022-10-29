@extends('layouts.app')

@section('title') create @endsection
@section('content')
        <form method="POST" action="{{route('posts.store')}}">
          @csrf
            <div class="mb-3">
              <label class="control-label col-sm-2">Title</label>
              <input name="title" type="text" class="form-control">
            </div>

            <div class="mb-3 ">
                <label class="control-label col-sm-2">Description</label>
                <textarea name="description" class="form-control"></textarea>
                <!-- <input type="text" class="form-control" > -->
            </div>

            <div class="mb-3">
                <label class="control-label col-sm-2">Post Creator</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="control-label col-sm-2">Select Image:</label>
                <div class="col-sm-5">
                  <input type="file"  name="image">
                </div>
            </div>

            <br><br>
            <button type="submit" class="btn btn-success" style='margin-left:50%'>Submit</button>
          </form>

@endsection
