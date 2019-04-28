@extends('layout')

@section('content')

<div class='cart-container'>
    <h1 class="title">Cart</h1>
    <table class="rwd-tbcontainer">
        <tr class="cart-title">
            <th> Item </th>
            <th> Album Cover </th>
            <th> Album Name </th>
            <th> Singer </th>
            <th> Booking Number </th>
            <th> Delete </th>
        </tr>

        @foreach($cartList as $key=>$album)
        <tr class="cart-album">
            <td> {{ $key }} </td>
            <td>
                <span class=helper></span>
                <img src="{{ asset('images/'.$album->coverimg_file) }}" class="cart-img">
            </td>
            <td element="Album : "> {{ $album['album_name'] }} </td>
            <td element="Singer : "> {{ $album['singer'] }} </td>
            <td element="Number : "> 
                <input type="text" id="cart-num" onkeyup=""/>
            </td>
            <td>
                <button type="button" value="Delete" id="cart-del" onclick="">Delete</button>
            </td>

        </tr>
        @endforeach
    </table>
</div>

<!---------------------------------------------------------------------------->

    <div class="flex-cart-list">
        <div calss="flex-title">
            <div class="cart-title"> Item </div>
            <div class="cart-title"> Album Cover </div>
            <div class="cart-title"> Album Name </div>
            <div class="cart-title"> Singer </div>
            <div class="cart-title"> Booking Number </div>
            <div class="cart-title"> Delete </div>
        </div>

        @foreach($cartList as $key=>$album)
            <div class="flex-album">
                <div class="element">{{ $key }}</div>
                <div class="element">
                    <span class=helper></span>
                    <img src="{{ asset('images/'.$album->coverimg_file) }}" class="cart-img">
                </div>
                <div class="element">{{ $album['album_name'] }}</div>
                <div class="element">{{ $album['singer'] }}</div>
                <div class="element">
                    <input type="text" id="cart-num" onkeyup=""/>
                </div>
                <div class="element">
                    <button type="button" value="Delete" id="cart-del" onclick="">Delete</button>
                </div>
            </div>
        @endforeach

    </div>
    <h3>Total price: 0</h3>
    <button type ="button" name="checkout" value="checkout"  onclick="location.href=\'modules/checkout.php\'">Checkout</button>
</div>


@endsection
