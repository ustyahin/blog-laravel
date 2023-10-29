<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getpost($postId)
    {
        //$post = Post::where('id', $postId)
            // ->orderBy()
            // ->get();
           // ->first(); // return Model Post

        $post = Post::where('id', $postId)
            ->first(); // return Model Post

        if (is_null($post)) {
            return "No posts = " . $postId;
        }

        // $post->id
        // $post->title
        // $post->...



        // posts where category = 3
        $posts = Post::where('category', 3)
            ->get(); // return array Collection
        // $posts[0]->id
        // $posts[0]->title
        // ...
        // $posts[1]->id
        // $posts[1]->title
        // ...

        $params = [
            'nazvanie' => $post->title, // title = 'Politika zagolovok'
            'posts_category' => $posts // array
        ];

        return view('database', $params);
    }


    //blog

    public function getAll()
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


    public function showById($id)
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
            ->where('posts.id', $id)
            ->first();

        $category = Category::all();


        $result = ['post' => $post, 'categories' => $category];
        return view('selectpost', $result);
    }

    public function showEdit($id)
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
            ->where('posts.id', $id)
            ->first();


        $category = Category::all();


        $result = ['post' => $post, 'categories' => $category];
        return view('post', $result);

    }


    public function edit(EditPostRequest $request)
    {
        $id = $request->postId;
        $title = $request->title;
        $text = $request->text;
        $category = $request->category;

        $post = Post::find($id);
        $post->title = $title;
        $post->text = $text;
        $post->category = $category;
        $post->date_changed = Carbon::now()->format('Y-m-d H:i:s');
        $post->save();

        /*$affectedRows = Post::where('id', $id)
                    ->update(array('title'=>$title, 'text'=>$text, 'date_changed'=>NOW(), 'category'=>$category));

        if ($affectedRows == 1){

        }*/

        return redirect('/index');
    }

    public function showCreate()
    {
        $category = Category::all();
        $result = ['categories' => $category];

        return view('addpost', $result);
    }

    public function getcreate(Request $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->category = $request->category;
        $post->date = Carbon::now()->format('Y-m-d H:i:s');
        $post->date_changed = Carbon::now()->format('Y-m-d H:i:s');
        $post->user = 3;

        $post->save();

        return redirect('index');

    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('index');

    }

    public function showByCategoryId($id)
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
    }






}
