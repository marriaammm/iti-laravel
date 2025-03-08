<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = [
            [
                'id' => 1,
                'title' => 'Learn PHP',
                'author' => 'Ahmed',
                'created_at' => '2018-04-10'
            ],
            [
                'id' => 2,
                'title' => 'Solid Principles',
                'author' => 'Mohamed',
                'created_at' => '2018-04-12'
            ],
            [
                'id' => 3,
                'title' => 'Design Patterns',
                'author' => 'Ali',
                'created_at' => '2018-04-13'
            ]
        ];
        return view('posts.index',['posts'=>$posts]);
    }
}
