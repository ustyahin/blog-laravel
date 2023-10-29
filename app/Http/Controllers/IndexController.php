<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Post;
use App\Category;


class IndexController extends Controller
{
    public function index()
    {
        $post = Post::select('posts.id AS id',
            'categories.name AS category_name',
            'users.login AS user',
            'posts.title AS title',
            'posts.text AS text',
            'posts.date',
            'posts.date_changed')
            ->leftJoin('categories', 'posts.category', '=', 'categories.id')
            ->leftJoin('users', 'posts.user', '=', 'users.id')
            ->orderBy('id', 'desc')
            ->get();
        $category = Category::all();


        $resultPost = ['posts' => $post, 'categories' => $category];

        return view('index', $resultPost);

    }
}
