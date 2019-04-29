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
        /* overflow: hidden; */
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
          background-color: gray;
        }
        li.auto{
            float:none;
            margin-right:auto!important;
        }

        @media (max-width: 600px) 
        {
          ul.navbar {
            display: flex;
            flex-direction: column;
          }
         li.nav-item, li.right-nav-item {
            display: block;
          }
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 26px;
 
        text-decoration: none;
        }

        /* number of items in cart */
        .cart-quantity {
          font-size: 15px;
          background: #b30000;
          color: #fff;
          padding: 0 5px;
          vertical-align: middle;

          padding-left: 9px;
          padding-right: 9px;
          -webkit-border-radius: 9px;
          -moz-border-radius: 9px;
          border-radius: 9px;
      }

        li a:hover {
        background-color: #111;
        }

    


        #username{
          position: relative;
        }


        #miniProfile{
            display: none;
            position: absolute;
     
            background-color:rgba(255, 240, 240,.6);;
            width: 250px;
            right:0px;
            top: 52px;
        }

        #username:hover #miniProfile{
            display: block;
          position: absolute; 

        }

        .profile{
          margin: 15px;
          font-size: 18px;
          color: black;
          font-weight:bold;
        }
        .link-profile{
          background-color:slategrey;
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
          text-align: left;
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

        .rwd-tbcontainer th, .rwd-tbcontainer td:before {
          color:  #336699;
          font-weight: bold;
        }
       
        @media (min-width: 600px) 
        {
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

        #cart-num{
          max-width:60px;
        }



      </style>
    </head>
    <body>
         @include('menu')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>