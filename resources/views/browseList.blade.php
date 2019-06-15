<?php  
    $cartids = [];
    if(session()->has('cart')){
        $cartids = session()->get('cart');
    }
?>

<div class="flex-container">
    @foreach($albumList as $album)
        <div class="prodouctBox">
            <div class = "productImg">
                <img src="{{ asset('images/'.$album->coverimg_file) }}" class="browse-img">
            </div>
            <div class="productName"  style="color:#71b412"><b>{{ $album['album_name'] }}</b></div>
            <div class="productSinger" style="color:#71b412"><b>{{ $album['singer'] }}</b></div>
            <div class="ProductRelease"><p>Release: {{ $album['release'] }}</p></div>
            <div class="productPrice"><p>$ {{ $album['price'] }}</p></div>
            <button type ="button" id="AddBtn{{$album['id']}}" onclick="addToCart({{ $album['id'] }}); disableAddButton({{$album['id']}});" 
                {{in_array($album['id'], $cartids)?' disabled':''}}>
                {{in_array($album['id'], $cartids)?'Added':'Add to Cart'}}</button>
        </div>
    @endforeach

</div>