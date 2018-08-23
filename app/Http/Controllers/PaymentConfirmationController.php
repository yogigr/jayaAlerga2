<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\AdminBank;
use App\PaymentConfirmation;
use File;

class PaymentConfirmationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function create(Order $order)
    {
    	$adminBanks = AdminBank::all();
    	return view('member.paymentconfirmation.create', compact('order', 'adminBanks')); 
    }

    public function store(Request $request, Order $order)
    {
    	$request->validate([
    		'transfer_date' => 'required',
    		'admin_bank_id' => 'required|string',
    		'user_bank_name' => 'required|string',
    		'bank_account' => 'required|numeric',
    		'under_the_name' => 'required|string',
    		'amount' => 'required|numeric',
    		'image' => 'required|image|mimes:jpeg,png|max:200'
    	]);

    	 //delete file
    	if ($order->hasPaymentConfirmation()) {
    		 File::delete(public_path('images/payment_confirmation/'.$order->payment_confirmation->image));
    	}
       
    	//upload image
    	$filename = $order->code.'.'.$request->image->getClientOriginalExtension();
    	$request->image->move(public_path('images/payment_confirmation'), $filename);

    	//update or create
    	PaymentConfirmation::updateOrCreate(
    		['order_id' => $order->id],
    		[
    			'transfer_date' => Carbon::createFromFormat('d/m/Y', $request->transfer_date)->toDateString(),
	    		'admin_bank_id' => $request->admin_bank_id,
	    		'user_bank_name' => $request->user_bank_name,
	    		'bank_account' => $request->bank_account,
	    		'under_the_name' => $request->under_the_name,
	    		'amount' => $request->amount,
	    		'image' => $filename
    		]
    	);

    	return redirect('member/order/'.$order->code)
    	->with('status', 'Konfirmasi Pembayaran telah dibuat, kami akan meninjau pembayaran anda dan akan secepatnya memproses pesanan anda.');
    }
}
