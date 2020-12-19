<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transactions';
    
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
    
    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }
}
