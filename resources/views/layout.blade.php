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
        /*----------- Cart ----------------------- */
        .flex-cart-list{
            display: inline-flex;
            flex-direction: column;
            background-color: #61a0f8;
            width:80%;
            
        }

        .flex-title{
            display: inline-flex; 
            align-content: flex-start;
        }

        .flex-album{
            display: inline-flex; 
            /* flex-direction: row; */
            flex-wrap:wrap;
            
            align-content: flex-start;
             
            padding: 15px;

            border:1px solid gray;
            background-color: #f2f2f2;
            margin: 0px;
            justify-content: center;
            text-align: center;
        }

         /*----------- Cart ----------------------- */
        .cart-img{
            max-height: 100px;
            max-width: 100px;
        }

        .rwd-tbcontainer {
		 	 background: #fff;
		 	 overflow: hidden;
			}

			.rwd-tbcontainer tr:nth-of-type(2n){
			  background: #eee;
			}
			.rwd-tbcontainer th, 
			.rwd-tbcontainer td {
			  margin: 0.5em 1em;
			}   
			.rwd-tbcontainer {
			  min-width: 100%;
			}

			.rwd-tbcontainer th {
			  display: none;
			}

			.rwd-tbcontainer td {
			  display: block;
			}

			.rwd-tbcontainer td:before {
			  content: attr(element);
			  font-weight: bold;
			  width: 6.5em;
			  display: inline-block;
			}

			.rwd-tbcontainer th, .rwd-tbcontainer td {
			  text-align: left;
			}

			.rwd-tbcontainer th, .rwd-tbcontainer td:before {
			  color: #D20B2A;
			  font-weight: bold;
			}

			@media (min-width: 480px) {
			  .rwd-tbcontainer td:before {
			    display: none;
			  }
			 .rwd-tbcontainer th, .rwd-tbcontainer td {
			    display: table-cell;
			    padding: 0.25em 0.5em;
			  }
			  .rwd-tbcontainer th:first-child, 
			  .rwd-tbcontainer td:first-child {
			    padding-left: 0;
			  }
			  .rwd-tbcontainer th:last-child, 
			  .rwd-tbcontainer td:last-child {
			    padding-right: 0;
			  }
			   .rwd-tbcontainer th, 
			   .rwd-tbcontainer td {
			    padding: 1em !important;
			  }
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