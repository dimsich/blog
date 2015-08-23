<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link media="all" type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div id="container">
        <div id="header"><a href="/">Blog</a></div>
        <div id="left_side">
            <div class="content">

                 @yield('content')

            </div>
        </div>
        <div id="right_side">

            <div class="right_side_title">Категории</div>
            <div class="categories">
                <ul>
                    @if(count($categories))
                        @foreach($categories as $category)
                            <li><a href="/category/{!! $category->id !!}">{{ $category->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            {{--<div class="right_side_title">Случайные статьи</div>
            <div class="random_articles">
                <ul>
                    <li><a href="#">Первая</a></li>
                    <li><a href="#">Вторая</a></li>
                    <li><a href="#">Третья</a></li>
                    <li><a href="#">Четвёртая</a></li>
                    <li><a href="#">Пятая</a></li>
                </ul>
            </div>--}}

        </div>
        <div class="clear"></div>
    </div>
</body>
</html>