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
        <p>@foreach($category as $cat)
            <p><a href="/category/{{$cat->id}}">{{$cat->name}}</a></p>
            @endforeach
    </p>


    </div>

    <div id="content">

        @foreach ($post as $posts)
            <div class='card'>
                <table border='1'>
                    <tbody>
                    <h1><a href='/post/{{$posts->id}}'>{{$posts->title}}</a></h1>
                    <p>{{$posts->text}}</p>

                    <tr><td align='center'>Категория: {{$posts->category_name}}</td><td align='center'>Автор: {{$posts->user}}</td></tr>
                    <tr><td align='center'>Дата: {{$posts->date}}</td><td align='center'>Изменено: {{$posts->date_changed}}</td></tr>


                    <tr><td align='center'><a href="/post/{{$posts->id}}/delete">Удалить</a></td>
                        <td align='center'><a href="/post/{{$posts->id}}/edit">Изменить</a></td></tr>





                    </tbody>
                </table>
            </div>
            <br />


        @endforeach





    </div>




</body>
</html>
