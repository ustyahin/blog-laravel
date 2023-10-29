<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Сайт блог</title>
    <link rel="stylesheet" href="/css/blog.css">
</head>

<body>

<div id="header"><h1 align="center">Блог</h1></div>

<div id="sidebar">
    <p><a href="/index">На главную</a></p>
    <p><a href="/sign.php">Войти на сайт</a></p>
    <p><a href="/register.php">Зарегистрироваться</a></p>
    <p><a href="/post/create">Создать публикацию</a></p>

    <h3>Категории:</h3>

    <ul>
        @foreach($categories as $cat)
            <li><a href="/category/{{$cat->id}}">{{$cat->name}}</a></li>
        @endforeach
    </ul>

</div>

<div id="content">

    @foreach ($posts as $post)
        <div class='card'>
            <table border='1'>
                <tbody>
                <h1><a href='/post/{{$post->id}}'>{{$post->title}}</a></h1>
                <p>{{$post->text}}</p>
                <tr>
                    <td align='center'>Категория: {{$post->category_name}}</td>
                    <td align='center'>Автор: {{$post->user_name}}</td>
                </tr>
                <tr>
                    <td align='center'>Дата: {{$post->created_at}}</td>
                    <td align='center'>Изменено: {{$post->updated_at}}</td>
                </tr>
                <tr>
                    <td align='center'><a href="/post/{{$post->id}}/delete">Удалить</a></td>
                    <td align='center'><a href="/post/{{$post->id}}/edit">Изменить</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    @endforeach

</div>


</body>
</html>
