<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function index(){
        // $allComments = Comment::all();

        // return view('posts.show',[
        //     'comments' => $allComments
        // ]);
    }

    public function store($postId){
        $data = request()->all();
        // dd($data);
        $post = Post::findOrFail($postId);
        $post->comments()->create([
            'body' => $data['body'],
        ]);
        return redirect()->route('posts.show',$postId);

    }

    public function destroy($postId){
        $singlePost = Post::findOrFail($postId);

        // dd($singlePost['']);
        $singlePost -> delete();
        return redirect()->route('posts.index');

        // dd("we are in destroy");
    }
}
