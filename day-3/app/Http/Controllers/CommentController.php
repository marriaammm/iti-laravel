<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
{
    $post->comments()->create([
        'body' => request('body'),
        'user_id' => auth()->id(),
    ]);
    return to_route('posts.show', $post->id);
}

public function destroy(Comments $comment)
{
    $comment->delete();
    return to_route('posts.show', $comment->commentable_id);
}

}

