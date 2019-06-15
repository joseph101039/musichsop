<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Music Shop</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <!-- home, browse and cart page -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <!-- Login, Register and change password page -->
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <style>
        </style>
    </head>
    <body>
       <!--  <?php dd($eztrans); ?> -->
       <!--  <div class="container">
            <form id="ezpay_form" method="POST" action="https://cpayment.ezpay.com.tw/MPG/mpg_gateway">
                MerchantID：<input type='text' name='MerchantID' value='?????'><br>
        </div> -->
        <form action="{{ $apiUrl }}" id="pay-form" method="post">
            @foreach($postData as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}">
            @endforeach
        </form>

    </body>
    <script>
        document.getElementById('pay-form').submit();
    </script>

</html>
