<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function auth(){
    	return $this->belongsTo(Admin::class,'auth_id','id');
    }
    
}
