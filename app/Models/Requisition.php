<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function requisitionType(){
    	return $this->belongsTo(RequisitionType::class,'requisitionType_id','id');
    }
}
