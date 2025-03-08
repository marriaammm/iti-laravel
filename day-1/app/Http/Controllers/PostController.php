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

    public function show($id){
        $post = [
            'id' => 1,
            'title' => 'Laravel',
            'description' => 'some description',
            'posted_by' => [
                'name' => 'ahmed',
                'email' => 'test@gmail.com',
                'created_at' => 'Thursday 25th of December 1975 02:15:16 PM',
            ],
            'created_at' => '2025-03-08 12:47:00',
        ];
        return view('posts.show',['post'=>$post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        // $data=request()->all();
        $title=request()->title;
        $description=request()->description;
        // dd($title,$description);
        return to_route('posts.show',1);
    }

    public function edit($id){
        return view('posts.edit');
    }
}
