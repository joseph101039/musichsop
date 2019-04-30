<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'user_id', 'album_id', 'number',
    ];
    protected $table = 'cart';

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->get();
    }
}
