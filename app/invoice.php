<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable=['invoice_name','no_inv_items', 'tax'];

   	public function items(){
     	return $this->hasMany(Items::class);
    }

    public function subtotal() {

    	$subtotal = 0; 
    	// get items 
    	foreach($this->items as $item) {
    		$subtotal += $item->no_items * $item->price; 
    	}

    	// loop items and add 
    	// return subtotal 
    	return $subtotal; 
    }
    public function total(){

    	$stotal = $this->subtotal();
    	$tax = $this->tax;
    	$total = ($stotal/100)*$tax +$stotal ;
    	return $total ;
    }
}
