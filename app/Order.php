<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";

    protected $guarded = [
        'created_at', 'updated_at',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function credit_card()
    {
        return $this->belongsTo(CreditCard::class, 'credit_card_id');
    }

    public function atm()
    {
        return $this->belongsTo(Atm::class, 'atm_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }


}
