<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_transaction(){
        return $this->hasMany(Cart::class);
    }
}
