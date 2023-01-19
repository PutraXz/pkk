<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckShopping extends Controller
{
    public function __invoke()
    {
        $shop = Shopping::where('user_id', Auth::user()->id)->where('status', 0)->get();
        $db =  $shop->sum('jumlah_harga');
        $sum = $shop->sum('jumlah');
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-nZLapjhFwbJb6OkdVZPlcFLq';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        foreach ($shop as $key) {
            $items = Products::where('id', $key->product_id)->firstOrFail();
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $db,
                ),
                'item_details' => array(
                    
                    [
                        "id" => $key->id,
                        "price" => $items->price,
                        "quantity" =>  $sum,
                        "name" => $items->title
                    ],
                ),
                'customer_details' => array(
                    'first_name' => $key->nama_pelanggan,
                    'last_name' => '',
                    'email' => 'budi.pra@example.com',
                    'phone' => $key->no_hp,
                ),
            );
        }
        
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('users.check_out', compact('shop', 'db', 'snapToken'));
    }
    public function pay(Request $request){
        return $request;
    }
}
