<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    //
    protected $table = 'atm';

    protected $guarded =[
        'id', 'created_at', 'updated_at',
    ];
}
