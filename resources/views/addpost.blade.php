<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Сайт блог</title>
    <link rel="stylesheet" href="/css/blog.css">
</head>

<body>

    <div id="header"><h1 align="center">Создать публикацию</h1></div>

    <div id="sidebar">

            <p><a href="/index">На главную</a></p>
            <p><a href="/sign.php">Войти на сайт</a></p>
            <p><a href="/register.php">Зарегистрироваться</a></p>
            <p><a href="/post/create">Создать публикацию</a></p>
            <p><h3>Категории:</h3>
            <p>@foreach($categories as $cat)
                <p><a href="/category/{{$cat->id}}">{{$cat->name}}</a></p>
                @endforeach

    </div>


<div id="content">
    <form action="/addpost/get" method="POST">
        @csrf
        <label>Заголовок поста:</label>
        <p><input type="text" name="title"></p>
        <label>Текст поста:</label>
        <p><input type="text" name="text"></p>
        <label>Категория поста:</label>
        <p><select id="category" name="category">

        @foreach ($categories as $cat)

            <option value ="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select>
        <p><input type="submit" value="Создать"></p>
    </form>
</div>
