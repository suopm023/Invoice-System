<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
   protected $fillable=[
   		'item_name',
   		'no_items',
   		'price',
   		'invoice_id'
   		];
   	public function invoice(){
    	return $this->belongTo(Invoice::class);
    }

}

