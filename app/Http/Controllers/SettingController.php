<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\City;
use App\Province;
use File;

class SettingController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$company = About::firstOrFail();
    	$cities = City::all();
    	$provinces = Province::all();
    	return view('admin.setting.index', compact('company', 'cities', 'provinces'));
    }

    public function updateCompany(Request $request)
    {
    	$company = About::firstOrFail();
    	$request->validate([
    		'company_name' => 'required|string',
    		'company_desc' => 'required|string',
    		'email' => 'required|email',
    		'address' => 'required|string',
    		'city_id' => 'required',
    		'province_id' => 'required',
    		'postal_code' => 'required',
    		'phone1' => 'required|numeric',
    		'logo' => 'image|mimes:png|max:200'
    	]);

    	if ($request->hasFile('logo')) {
    		if (file_exists(public_path('images/web/'.$company->logo))) {
    			File::delete(public_path('images/web/'.$company->logo));
    		}
    		//upload logo
    		$filename = 'logo.'.$request->logo->getClientOriginalExtension();
    		$request->logo->move(public_path('images/web'), $filename);
    		$company->logo = $filename;
    		$company->save();
    	}

    	//update database
    	$company->company_name = $request->company_name;
    	$company->company_desc = $request->company_desc;
    	$company->email = $request->email;
    	$company->address = $request->address;
    	$company->city_id = $request->city_id;
    	$company->province_id = $request->province_id;
    	$company->postal_code = $request->postal_code;
    	$company->phone1 = $request->phone1;
    	$company->phone2 = $request->phone2;
    	$company->instagram = $request->instagram;
    	$company->facebook = $request->facebook;
    	$company->twitter = $request->twitter;
    	$company->google = $request->google;
    	$company->save();

    	return redirect('admin/setting')->with('status', 'Berhasil update data perusahaan');
    }
}
