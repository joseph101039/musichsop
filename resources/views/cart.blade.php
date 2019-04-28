@extends('layout')

@section('content')
@include('cartRequest')
<div class='cart-container'>
    <h1 class="title">Cart</h1>
    <table class="rwd-tbcontainer">
        <tr class="cart-title">
            <th> Item </th>
            <th> Album Cover </th>
            <th> Album Name </th>
            <th> Singer </th>
            <th> Price </th>
            <th> Booking Number </th>
            <th> Delete </th>
        </tr>
    
        @foreach($cartList as $key=>$album)
            @if($key !== "price_sum")
                <tr class="cart-album">
                    <td> {{ $key }} </td>
                    <td>
                        <span class="helper"></span>
                        <img src="{{ asset('images/'.$album['coverimg_file']) }}" class="cart-img">
                    </td>
                    <td element="Album : "> {{ $album['album_name'] }} </td>
                    <td element="Singer : "> {{ $album['singer'] }} </td>
                    <td element="Price : " class="priceTag">$ {{ $album['price'] }} </td>
                    <td element="Number : "> 
                        <input type="number" class="quantity" min="1" max="99" value="{{ $album['number'] }}"
                            onchange="updateCart(this, {{$album['id'] }});"
                            onkeyup="limit(this);"/>
                    </td>
                    <td>
                        <button type="button" value="Delete" id="cart-del" onclick="deleteCart({{$album['id'] }}); ">Delete</button>
                    </td>

                </tr>
            @endif
        @endforeach
    </table>

</div>
<div class="checkout">
    @if(count($cartList) == 0)

        <h2> You have not added any items to cart.</h2>
    @else
        <span><h3>Total price: $</h3></span><span><h3 id="price-sum">{{ $cartList['price_sum'] }}</h3></span>
        <button type ="button" name="checkout" value="checkout"  onclick="checkout();">Checkout</button>
    @endif
</div>


@endsection
