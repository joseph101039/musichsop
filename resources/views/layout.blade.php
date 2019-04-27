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

       .browse-img{
            max-height:300px; 
            max-width:300px;

        }

        .flex-container{
            display: inline-flex;
            flex-direction: row;
            flex-wrap:wrap;

            align-content: flex-start;
            /* background-color: #61a0f8; */
            padding: 15px;
        }

        

        .prodouctBox{
            width:320px;
            border:1px solid gray;
            background-color: #f2f2f2;
            margin: 5px;
            justify-content: center;
            text-align: center;
        }

        .productImg{
            display:inline-block;
            height:300px;
            vertical-align: middle;
            white-space: nowrap;

        }

        .productImg .helper{
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            background-color: black;
        }

        .productImg img{
            vertical-align: middle;
        }

        .filter{
            display: inline-flex;
            flex-direction: row;
            flex-wrap:wrap;
            margin: 10px;
            
        }

        .filter-item{
            margin: 10px;
            display: inline-flex;
            align-items:center;
            justify-content:center;
            
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