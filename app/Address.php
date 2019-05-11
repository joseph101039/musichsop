<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'addresses';

    protected $fillable=[
        'county', 'city',
    ];

    public function orders()
    {
        return $this->hasOne(Order::class, 'address_id');
    }
}
