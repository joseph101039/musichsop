<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable=[
        'album_name', 'singer', 'coverimg_file', 'release', 'price',
    ];
}
