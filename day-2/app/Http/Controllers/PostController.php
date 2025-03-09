<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    public function create(){
        $users=User::all();
        return view('posts.create',compact('users'));
    }

    public function store(){
        $title=request()->title;
        $description=request()->description;
        $postCreator=request()->creator;
        $post=Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
        ]);
        return to_route('posts.show',$post->id);
    }

    public function edit($id){
        $post = Post::findOrFail($id); 
        $users = User::all(); 
        return view('posts.edit', compact('post', 'users')); 
    }

    public function update($id){
        $title=request()->title;
        $description=request()->description;
        $postCreator=request()->creator;
        $post = Post::findOrFail($id);
        $post->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
        ]);
        return to_route('posts.show', $post->id);
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return to_route('posts.index');
    }
}
