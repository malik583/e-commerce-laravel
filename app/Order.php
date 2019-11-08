<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Order;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','b_name','b_address','b_city','b_state','b_country','b_mobile','b_email','s_name','s_address','s_city','s_state','s_country','s_mobile','s_email','total_amount','name_in_card','cart_type'];
    public function insertOrderModel($data , $user_id)
    {
    	$order = new Order();
    	$order->user_id = $user_id;
    	$order->b_name = $data['b_name'];
    	$order->b_address = $data['b_address'];
    	$order->b_city = $data['b_city'];
    	$order->b_state = $data['b_state'];
    	$order->b_country = $data['b_country'];
    	$order->b_mobile = $data['b_mobile'];
    	$order->b_email = $data['b_email'];
    	$order->s_name = $data['s_name'];
    	$order->s_address = $data['s_address'];
    	$order->s_city = $data['s_city'];
    	$order->s_state = $data['s_state'];
    	$order->s_country = $data['s_country'];
    	$order->s_mobile = $data['s_mobile'];
    	$order->s_email = $data['s_email'];
    	$order->total_amount = $data['total_amount'];
    	$order->name_in_card = $data['name_in_card'];
    	$order->cart_type = $data['cart_type'];
    	$order->save();
    	return $order;
    }
    public function validatePlaceOrderModel($inputdata)
    {
    	if((!is_numeric($inputdata['b_mobile'])) || (!is_numeric($inputdata['s_mobile'])))
    	{
    		return ['code'=> 400 , 'Message' => "Mobile Number contains only Numbers."];
    	}
    	return ['code' => 200,'Message' => "Valid Data"];
    }
}
