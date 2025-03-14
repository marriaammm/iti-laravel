<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Http\Request;

class InerrtiaPostController extends Controller
{
 
    public function index()
    {
        
        $posts = Post::withTrashed()->with('user')->paginate(10);
        return Inertia::render('Posts/Index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::with(['user'])->withTrashed()->findOrFail($id);
        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);
    }

    public function edit($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        return Inertia::render('Posts/Edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return Inertia::render('Posts/Index', [
            'posts' => Post::all(),
        ]);
    }

    public function destroy(Post $post)
    {
        
        $post->delete();
      
        return Inertia::render('Posts/Index', [
            'posts' => Post::with('user')->paginate(10),
            'success' => 'Post deleted successfully.'
        ]);
    }

    

public function archived()
{
    $posts = Post::onlyTrashed()->with('user')->paginate(10);

    return Inertia::render('Posts/Archived', [
        'posts' => $posts
    ]);
}
public function restore($id)
{
    $post = Post::onlyTrashed()->findOrFail($id);
    $post->restore(); 

    $posts = Post::onlyTrashed()->with('user')->paginate(10);

    return Inertia::render('Posts/Archived', [
        'posts' => $posts,
        'success' => 'Post restored successfully.'
    ]);
}
public function forceDestroy($id)
{
    $post = Post::onlyTrashed()->findOrFail($id);
    $post->forceDelete(); 
    $posts = Post::onlyTrashed()->with('user')->paginate(10);

    return Inertia::render('Posts/Archived', [
        'posts' => $posts,
        'success' => 'Post permanently deleted.'
    ]);
}

}
