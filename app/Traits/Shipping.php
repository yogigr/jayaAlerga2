<?php 

namespace App\Traits;
use App\Cart;
use Session;
use File;

trait Shipping
{
    public function getShippingJson()
    {
        File::delete(database_path('json/ongkir.json'));

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$this->srcCityId()."&destination=".$this->desCityId()."&weight=".$this->totalWeight().'&courier=jne',
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
                "key: " . env('RAJAONGKIR_KEY') 
                ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            File::put(database_path('json/ongkir.json'), $err);
        } else {
            File::put(database_path('json/ongkir.json'), $response);
        }
    }

    public function shippingData()
    {
    	$this->getShippingJson();
        $file = File::get(database_path('json/ongkir.json'));
        $data = json_decode($file);
        return $data;
    }

    public function cartSubtotal()
    {
        $cartSubtotal = 0;
        $carts = Cart::where('session_id', Session::getId())->get();
        foreach ($carts as $cart) {
            $cartSubtotal += $cart->total();
        }
        return $cartSubtotal;
    }

    private function totalWeight()
    {
    	$totalWeight = 0;
    	$carts = Cart::where('session_id', Session::getId())->get();
    	foreach ($carts as $cart) {
    		$totalWeight += $cart->qty * $cart->product->weight;
    	}
    	return $totalWeight;
    }

    private function srcCityId()
    {
    	return \App\About::firstOrFail()->city_id;
    }

    private function desCityId()
    {
    	return \App\Checkout::where('session_id', Session::getId())->first()->city_id;
    } 
}