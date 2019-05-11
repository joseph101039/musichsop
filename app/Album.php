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

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'album_id');
    }

}