<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //

    public function location()
    {
        return $this->hasMany('App\Models\BankLocation','bank_id','id');
    }


}
