<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

use App\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	if((is_null($request)) OR (empty($request)))
    	{
    		return response()->json(['Message'=>'Request is Empty']);
    	}
    	else
    	{
    		return response()->json($_POST);
    	}
  //   	$cart = new Cart();

  //   	$user = Auth::user();

		// $user_id = $user['id'];
		// echo "<pre>";
		// echo "sdfsdfsdf<br/> Id:";
		// print_r($request->input('id'));
		// return response()->json($request->post());
		// print_r($request->input('description'));

  //   	$cart->user_id = $user_id;
  //   	$cart->product_id = $request->input('id');
  //   	$cart->product_title = $request->input('title');
  //   	$cart->product_description = $request->input('description');
  //   	$cart->product_price = $request->input('price');
  //   	$cart->product_logo = $request->input('logo');
  //   	$cart->no_of_items = $request->input('no_of_items');
  //   	$cart->save();

		// return response()->json($cart);
    }

	public function getCartDetailsByUserId($id)
	{
		$result = DB::table('cart')
				->where('user_id', $id)
				->where('delete_flag', 0)
				->get();

		return response()->json($result);
	}

	public function updateCartById($id)
	{
		$result = DB::table('cart')
					->where('id',$id)
					->update(['delete_flag' => 1]);

		return ['Status' => 'Successfully removed this Item from your cart..'];			
	}
	// public function helloWorld()
	// {
	// 	echo "Hello World!";
	// }
}
