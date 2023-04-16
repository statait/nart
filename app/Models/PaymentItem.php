<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function payment(){
    	return $this->belongsTo(Bank::class,'bank_id','id');
    }

}
