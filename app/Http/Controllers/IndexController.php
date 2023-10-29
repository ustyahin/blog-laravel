<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Post;
use App\Category;


class IndexController extends Controller
{
    public function index()
    {
        $post = Post::select(
                'posts.id AS id',
                'categories.name AS category_name',
                'users.name AS user_name',
                'posts.title AS title',
                'posts.text AS text',
                'posts.created_at',
                'posts.updated_at')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->orderBy('id', 'desc')
            ->get();

        $category = Category::all();
        $params = ['posts' => $post, 'categories' => $category];

        return view('index', $params);

    }
}
