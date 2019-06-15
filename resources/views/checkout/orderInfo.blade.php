@extends('layout')
@include('menu')
@section('content')
<h1 class="title">Your Checkout List</h1>
<div style="max-width: 700px;">
    <table class="rwd-tbcontainer" style="border:1px solid gray; ">
        <tr class="cart-title">
            <th> Item </th>
            <th> Album Cover </th>
            <th> Album Name </th>
            <th> Price </th>
            <th> Booking Number </th>
        </tr>

        @foreach($cartList as $key=>$album)
            @if($key !== "price_sum")
            <tr class="cart-album" >
                <td>
                    {{ $key + 1}} 
                </td>
                <td>
                    <img src="{{ asset('images/'.$album['coverimg_file'])}}" class="cart-img" >
                </td>
                <td element="Album : "> {{ $album['album_name'] }} </td>
                <td element="Price : " class="priceTag">$ {{ $album['price'] }} </td>
                <td element="Number : "> {{ $album['number'] }}</td>
            </tr>
            @endif
        @endforeach

        <tr class="cart-album" style="background-color:cadetblue">
            <td colspan="5">
                <div id="check-sum" >
                    <h3 style="font-weight:bold">
                        <span>Total price: $</span>
                        <span id="price-sum">{{ $cartList['price_sum'] }}</span>
                    </h3>
                </div>
            </td>
        </tr>
    </table>
</div>
<br><br>

<h1 class="title">Verify Your Checkout Information</h1>
<div class="head-pay ">
    <ul class="pay-nav">
        <li class="pay-opt">
            <a href="/p2geacc">電子帳戶(P2GEACC)</a>
        </li>
        <li class="pay-opt actived">
            <a href="/credit">信用卡(CREDIT)</a>
        </li>
        <li class="pay-opt">
            <a href="/webatm">ATM轉帳(VACC)</a>
        </li>
    </ul>

    <div class="body-pay">
        @include('checkout.creditForm')

    </div>
</div>




@endsection