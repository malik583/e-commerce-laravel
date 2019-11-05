<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\User;

use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller 
{
	public $successStatus = 200;
	// /** 
	// * login api 
	// * 
	// * @return \Illuminate\Http\Response 
	// */ 
	public function login()
	{ 
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
		{ 
			$user = Auth::user();
			$token =  $user->createToken('MyApp')-> accessToken;
			$jsonData = ['token' => $token,'Message'=>'Login Successfull','Code'=> 200];
			return response($jsonData);
		} 
		else
		{ 
			return response()->json(['Message'=>'Unauthorised User,Please provide proper Details','Code'=>401], 401); 
		} 
	}
	// public function login(Request $request)
	// {
	// 	$email = $request->input('email');
	// 	$password = $request->input('password');
	// 	$user_details = DB::table('users')
	// 			->where('email',$email)
	// 			->get();
	// 	$result = json($user_details);
	// 	return $result;
	// }
	// /** 
	// * Register api 
	// * 
	// * @return \Illuminate\Http\Response 
	// */ 
	public function register(Request $request)
	{ 
		$user = new User();
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));
		$user->mobile = $request->input('mobile');
		$user->address = $request->input('address');

		$user->save();
		return response()->json($user);
	}
	/** 
	* details api 
	* 
	* @return \Illuminate\Http\Response 
	*
	*/ 
	public function details()
	{
		$user = Auth::user();
		$user_id = $user['id'];
		return response()->json(['user_id' => $user['id']], $this-> successStatus);
	}
	// public function showData()
	// {
	// 	$d = new CartController();
	// 	$data = {
	// 			    "user_id": "5",
	// 			    "product_id": "3",
	// 			    "no_of_items": "1"
	// 		}
	// 	return echo''.$d->addToCart($data);
	// }
	public function hello(Request $request)
	{
		return response()->json(['Array : ' => $request]);
	}
}
?>
