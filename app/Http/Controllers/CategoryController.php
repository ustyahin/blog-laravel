<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function getcategory($catId)
    {
        $category = Category::where('id', $catId)->first();

        $params = [
            'category' => $category->name
        ];

        return view('category_test', $params);
    }

    /*public function getId($id)
    {
        $count = Category::select('id')->count();

        if ($id > $count){
            return "Такой категории не существует";
        }

        //$posts = Post::where('category', $id)->get();

        $posts = Post::select('posts.id AS id',
            'categories.name AS category_name',
            'users.login AS user',
            'posts.title AS title',
            'posts.text AS text',
            'posts.date',
            'posts.date_changed')
            ->leftJoin('categories', 'posts.category', '=', 'categories.id')
            ->leftJoin('users', 'posts.user', '=', 'users.id')
            ->where('posts.category', $id)
            ->get();

        $categories = Category::all();

        $result = ['post' => $posts, 'category' => $categories ];

        return view('category', $result);
    }*/


}
