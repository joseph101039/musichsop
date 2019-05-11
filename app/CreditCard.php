<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    //
    protected $table = "credit_card";
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'credit_card_id');
    }

}
