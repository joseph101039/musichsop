

@extends('layout')

@section('content')
<h1 class="title">Music Shop</h1>
<div class="box">
    <div class="best-sale">
        <div class="box">
            <h2 class="title"> 精選熱賣專輯 </h2>
        </div>

        <div style="display:inline;">
            <!-- Best sale image -->  
            @foreach($bestSale as $album)
               <img src="{{ asset('images/'.$album->coverimg_file) }}" style="max-height:300px; max-width:300px;" title="{{ $album->album_name }}">
            @endforeach
        </div>

    </div>
</div>

<div class="box">
    <div class="most-view">
        <div class="box">
            <h2 class="title"> 最多瀏覽專輯 </h2>
        </div>

        <div style="display:inline;">
            <!-- Best sale image -->
            @foreach($mostView as $album)
               <img src="{{ asset('images/'.$album->coverimg_file) }}" style="max-height:300px; max-width:300px;" title="{{ $album->album_name }}">
            @endforeach
        </div>
    </div>
</div>
@endsection

