<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function register(Request $req) {
		if(is_null($req->name)) {
	    	return response()->json(['status' => 401, 'message' => 'Your need to insert name field'],200);
	    }
	    if(is_null($req->email)) {
	    	return response()->json(['status' => 401, 'message' => 'Your need to insert email field'],200);
	    }

	   	if(is_null($req->password)) {
	    	return response()->json(['status' => 401, 'message' => 'Your need to insert password field'],200);
	    }
	    $findUser = User::where('email', $req->email);
	    if($findUser->exists()) {
	    	return response()->json(['status' => 401, 'message' => 'Sorry, Your current user is already exists in our records'],200);
	    }
		$validated = $req->validate([
	        'name' => 'required|string|min:8',
	        'email' => 'required|email|unique:users,email',
	        'password' => 'required|min:6'
	    ]);

	    $insertRecord = [
	    	'name' => $req->name,
	    	'email' => $req->email,
	    	'password' => Hash::make($req->password)
	    ];

	    $user = User::create($insertRecord);
	    if(!is_null($user)) {
	    	return response()->json(['status' => 200, 'message' => 'Your create account is successfully', 'details' => $user],200);
	    } else {
	    	return response()->json(['status' => 401, 'message' => 'Something went wrong'],200);
	    }
	}
}
