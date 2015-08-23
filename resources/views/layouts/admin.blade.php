<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Панель администратора</title>
<link media="all" type="text/css" rel="stylesheet" href="/css/style_admin.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(window).resize(function(){
            $("#left_side").height($(window).height()-$("#header").height());
        });
        $("#left_side").height($(window).height()-$("#header").height());
    });
</script>

</head>
<body>
<div id="container">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="100%" valign="top" colspan="2">
            <div id="header">
                <a class="exit" href="/auth/logout">Выход</a>
                <a class="go_site" target="_blank" href="/">На сайт</a>
                <div class="logo"><img src="/images/owl.png">TEST BLOG</div>
            </div>
            <!--/#header-->
        </td>
    </tr>
    <tr>
        <td valign="top" style="background-color: #183C60;">
            <div id="left_side">
                <ul>
                    <li><a href="/admin/categories">Категории</a></li>
                    <li><a href="/admin/articles">Статьи</a></li>
                </ul>
            </div>
            <!--/#left_side-->
        </td>
        <td width="100%" valign="top">
            <div id="content">
                <h3>@yield('name')</h3>
                @yield('content')
            </div>
            <!--/#content-->
        </td>
    </tr>
</table>
</div>
<!--/#container-->
</body>
</html>