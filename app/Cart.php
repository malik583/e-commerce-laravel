<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['user_id','product_id','product_title','product_description','product_price','product_logo','no_of_items','total_amount','delete_flag'];

    public function getCartDetailsByUserIdModel($user_id)
    {
    	$result = DB::table($this->table)
				->where('user_id', $user_id)
				->where('delete_flag', 0)
				->get();
		return $result;
    }
    public function getTotalAmountModel($user_id)
    {
    	// $amount = 0;
    	$amount = DB::table($this->table)
				->where('user_id', $user_id)
				->where('delete_flag', 0)
				->sum('total_amount');
    	return $amount;
    }
}