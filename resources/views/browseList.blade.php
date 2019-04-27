
<div class="flex-container">
    @foreach($albumList as $album)
        <div class="prodouctBox">
            <div class = "productImg">
                <span class=helper></span>
                <img src="{{ asset('images/'.$album->coverimg_file) }}" class="browse-img">
            </div>
            <div class="productName"  style="color:#71b412"><b>{{ $album['album_name'] }}</b></div>
            <div class="productSinger" style="color:#71b412"><b>{{ $album['singer'] }}</b></div>
            <div class="ProductRelease"><p>Release: {{ $album['release'] }}</p></div>
            <div class="productPrice"><p>$ {{ $album['price'] }}</p></div>
            <input type ="button" onclick="addToCart({{ $album['id'] }})" value="Add to Cart">
        </div>
    @endforeach

</div>