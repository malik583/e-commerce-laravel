<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Order;
use App\User;
class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
    	$user = Auth::user();
    	$user_id = $user['id'];
    	$obj = new Order();
    	$validatedResponse = $obj->validatePlaceOrderModel($request);
    	if($validatedResponse['code']==200)
    	{
    		$result = $obj->insertOrderModel($request , $user_id);
    	}
    	else
    	{
    		$result = ['Error' => $validatedResponse['Message']];
    	}
    	
    	return $result;
    }
}
