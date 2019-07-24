<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankLocation extends Model
{
    //
    public function currency()
    {
        return $this->hasOne('App\Models\Currency','id','currency_id');
    }

}
