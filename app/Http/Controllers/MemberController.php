<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Province;
use Auth;
use Hash;

class MemberController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function account()
    {
    	$user = Auth::user();
    	$provinces = Province::all();
    	$cities = City::all();
    	return view('member.account', compact('user', 'cities', 'provinces'));
    }

    public function updateAccount(Request $request)
    {
    	$user = Auth::user();

    	$request->validate([
    		'first_name' => 'required|string',
    		'last_name' => 'required|string',
    		'email' => 'required|email|unique:users,email,'.$user->id,
    		'phone' => 'required|numeric',
    		'address' => 'required',
    		'city_id' => 'required',
    		'province_id' => 'required',
    		'postal_code' => 'required'
    	]);

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->city_id = $request->city_id;
    	$user->province_id = $request->province_id;
    	$user->postal_code = $request->postal_code;
    	$user->save();

    	return redirect('member/account')->with('status', 'Berhasil diupdate');
    }

    public function changePassword(Request $request)
    {
    	$user = Auth::user();
    	$request->validate([
    		'old_password' => [
				'required',
				function($attribute, $value, $fail) use ($user) {
					if (!Hash::check($value, $user->password)) {
						return $fail($attribute.' is invalid');
					}
				},
			],
			'new_password' => 'required|string|min:6|confirmed'
    	]);

    	$user->password = bcrypt($request->new_password);
    	$user->save();
    	return redirect('member/account')->with('status', 'Berhasil mengganti password');
    }
}
