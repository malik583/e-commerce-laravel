<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	$cart = new Cart();
    	$user = Auth::user();
		$user_id = $user['id'];		
    	$cart->user_id = $user_id;
    	$cart->product_id = $request->input('id');
    	$cart->product_title = $request->input('title');
    	$cart->product_description = $request->input('description');
    	$cart->product_price = $request->input('price');
    	$cart->product_logo = $request->input('logo');
    	$cart->no_of_items = $request->input('quantity');
    	$cart->save();
		return response()->json($cart);
    }

	public function getCartDetailsByUserId()
	{
		$user = Auth::user();
		$user_id = $user['id'];
		$obj = new Cart();
		$result = $obj->getCartDetailsByUserIdModel($user_id);
		return response()->json($result);
	}

	public function deleteCartItem(Request $request)
	{
		$user = Auth::user();
		$user_id = $user['id'];
		$cart_id = $request->input('cart_id');
		$result = DB::table('cart')
					->where('id',$cart_id)
					->where('user_id',$user_id)
					->update(['delete_flag' => 1]);

		return ['Status' => 'Successfully removed this Item from your cart..'];			
	}

	public function updateCartItem(Request $request)
	{
		$user = Auth::user();
		$quantity = $request->input('no_of_items');
		$cart_id = $request->input('cart_id');
		$result = DB::table('cart')
					->where('id',$cart_id)
					->update(['no_of_items' => $quantity]);

		if($result == 1) //If fail
		{
			return ['Status' => 'Successfully Updated this Item..'];
		}
		else
		{
			return ['Status' => 'Something went wrong..'];
		}
	}
	public function getTotalAmount()
	{
		$user = Auth::user();
		$user_id = 11;
		$cartObj = new Cart();
		$amount = $cartObj->getTotalAmountModel($user_id);
		return $amount;
	}	
}



