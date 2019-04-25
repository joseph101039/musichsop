<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable=[
        'album_name', 'singer', 'coverimg_file', 'release', 'price',
    ];

    protected $table = 'albums';



    public static function getBestSale($num)
    {
        return Album::limit($num)->orderBy('salenum', 'desc')->get();
    }

    public static function getMostView($num)
    {
        return Album::limit($num)->orderBy('viewnum', 'desc')->get();
    }
}
