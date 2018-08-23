<?php

namespace App\Traits;

use App\Cart;
use App\Checkout;
use Carbon\Carbon;
use Session;
use DB;


trait OrderTrait
{
	public function generateCode($char, $table, $digitLength = 3)
    {
        $maxCodeToday = DB::table($table)->whereDate('created_at', today())->max('code');
        $today = Carbon::parse(today())->format('Ymd');
        if (is_null($maxCodeToday)) {
        	return $char . $today . str_pad(1, $digitLength, '0', STR_PAD_LEFT);
        } else {
            $currentNumber = substr($maxCodeToday, strlen($char) + strlen($today), $digitLength);
            $newNumber = str_pad((int)($currentNumber + 1), $digitLength, '0', STR_PAD_LEFT);
            return $char . $today . $newNumber;
        }
    }

    public function destroyCarts()
    {
    	foreach ($this->getCarts() as $cart) {
    		$cart->delete();
    	}
    }

    public function destroyCheckout()
    {
    	$this->getCheckout()->delete();
    }

    public function getCarts()
    {
    	return Cart::where('session_id', Session::getId())->get();
    }

    public function getCheckout()
    {
    	return Checkout::where('session_id', Session::getId())->first();
    }
}