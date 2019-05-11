<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    //
    protected $table = "payment_methods";

    protected $guarded = [
        'id','created_at', 'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'payment_method_id');
    }
}
