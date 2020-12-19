<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = 'pizzas';

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function detail_transaction(){
        return $this->hasMany(DetailTransaction::class);
    }
}
