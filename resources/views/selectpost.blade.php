<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Сайт блог</title>
    <link rel="stylesheet" href="/css/blog.css">
</head>

<body>

    <div id="header"><h1 align="center">Блог</h1></div>

        <p id="sidebar">
            <p><a href="/index">На главную</a></p>
            <p><a href="/sign.php">Войти на сайт</a></p>
            <p><a href="/register.php">Зарегистрироваться</a></p>
            <p><a href="/post/create">Создать публикацию</a></p>
            <p><h3>Категории:</h3>
            <p>@foreach($categories as $cat)
                <p><a href="/category/{{$cat->id}}">{{$cat->name}}</a></p>
                @endforeach
        </p>


        </div>

    <div id="content">


        <div class='card'>
            <table border='1'>
                <tbody>
                <h1><a href='/post/{{$post->id}}'>{{$post->title}}</a></h1>
                <p>{{$post->text}}</p>

                <tr><td align='center'>Категория: {{$post->category_name}}</td><td align='center'>Автор: {{$post->user}}</td></tr>
                <tr><td align='center'>Дата: {{$post->date}}</td><td align='center'>Изменено: {{$post->date_changed}}</td></tr>


                <tr><td align='center'><a href="/post/{{$post->id}}/delete">Удалить</a></td>
                    <td align='center'><a href="/post/{{$post->id}}/edit">Изменить</a></td></tr>





                </tbody>
            </table>
        </div>
        <br />




    </div>




</body>
</html>
