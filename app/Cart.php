<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }
}
