<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script>
            $(function(){
                $('a').each(function(){
                    if($(this).prop('href') == window.location.href){
                        $(this).addClass('active-nav'); 
                        $(this).parent('li').addClass('active-nav');
                    }
                });
            });
        </script>
        <title>Music Shop</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">

        <style>

        ul.navbar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
 
        }

        ul.navbar .active-nav{
            color: #F8F8F8;
            background-color: #4f81bd;
        }

        li.nav-item {
        float: left;
        }

        li.right-nav-item {
        float: right;
        background-color: #555;
        }
        li.auto{
            margin-right:auto!important;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 26px;
 
        text-decoration: none;
        }

        li a:hover {
        background-color: #111;
        }


        </style>
    </head>
    <body>
        <div class="container">
            @include('menu')
            @yield('content')
        </div>
    </body>
</html>