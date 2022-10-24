@extends('layouts.app')

@section('title') Index @endsection
@section('content')
<div class="text-center">
  <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
  <!-- <a href="posts--/create" class="mt-4 btn btn-success">Create Post</a> -->
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>

        <td>{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->user ? $post->user->name : 'user not found'}}</td>
        <td>{{$post->created_at->format('Y-m-d')}}</td>
        <td>
            <a href="{{route('posts.show', $post['id'])}}"><x-button class='primary' message='View' ></x-button></a>
            <a href="{{route('posts.edit', $post['id'])}}"><x-button class='secondary' message='Edit'></x-button></a>
            <form style="display:inline;" method="POST" action="{{route('posts.destroy', $post['id'])}}">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Do you want to Delete this Post?')" >Delete</button>
            </form>
            <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('confirm')" >Delete</button> -->

        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<
<div class="pagination justify-content-center">
    {{ $posts->links() }}
</div>
@endsection
