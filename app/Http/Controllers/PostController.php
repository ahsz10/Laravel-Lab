<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller{

    // public function test(){
    //     return 'hello from Controller';
    // }

    public function index(){
        // return 'index';
        $allPosts = Post::all();
        // dd($allPosts);
        // $allPosts = [
        //     ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22'],
        //     ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15'],
        // ];
        return view('posts.index',[
            'posts' => $allPosts
        ]);
    }
    public function create(){
        // return 'create';
        $users = User::all();
        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function show($postId){
        // $arr = [
        //     ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22'],
        //     ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15'],
        // ];
        // return 'we are in show now';

        $singlePost = Post::findOrFail($postId);
        return view('posts.show',[
            'post' => $singlePost
            // 'post' => $arr[$postId-1]
        ]);
    }

    public function store(){
        // $data = request();

        $title = request()->title;
        $description = request()->description;
        $user_id = request()->user_id;
        // dd($title, $description, $user_id);
        // dd($data->all());

        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id,
        ]);

        // dd($post);
        return redirect()->route('posts.index');
    }

    public function edit($postId){
        $users = User::all();
        $singlePost = Post::findOrFail($postId);
        return view('posts.edit',[
            'post' => $singlePost, 'users' => $users
        ]);
    }

    public function update($postId){
        $singlePost = Post::findOrFail($postId);

        $singlePost->update([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->user_id,
        ]);
        // dd($singlePost);
        return redirect()->route('posts.index');
    }

    public function destroy($postId){
        $singlePost = Post::findOrFail($postId);

        $singlePost -> delete();
        return redirect()->route('posts.index');
        dd($singlePost);

        // dd("we are in destroy");
    }

}
