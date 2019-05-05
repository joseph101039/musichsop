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
        <!-- home, browse and cart page -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <!-- Login, Register and change password page -->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <style>
            .container{
                padding-top: 1.5rem!important;
            }

            .box{
                background-color: rgba(0, 0, 0, .03);
            }

            
            .box-header {
                background-color: rgba(0, 61, 102, .07);
                text-align: center;
            }

      </style>
      <?php if(!session()->has('cart')){ session(['cart'=>[]]);}?>
    </head>
    <body>
         @include('menu')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>