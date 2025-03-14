<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::withTrashed()->paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function show($id){
        $post = Post::with('user')->find($id);

        if (request()->expectsJson()) {
            return response()->json([
                'title' => $post->title,
                'description' => $post->description,
                'user' => [
                    'name' => $post->user->name,
                    'email' => $post->user->email,
                ],
            ]);
        }
    
        return view('posts.show', compact('post'));
    }

    public function create(){
        $users=User::all();
        return view('posts.create',compact('users'));
    }

    public function store(StorePostRequest $request){
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator, 
        ]);
        return to_route('posts.show',$post->id);
    }

    public function edit($id){
        $post = Post::findOrFail($id); 
        $users = User::all(); 
        return view('posts.edit', compact('post', 'users')); 
    }

    public function update(UpdatePostRequest $request, $id){
        $post = Post::findOrFail($id);
    $post->update([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => $request->creator,
    ]);
        return to_route('posts.show', $post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        return to_route('posts.index');
    }

    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore(); 
        return to_route('posts.index');
    }

    
}
