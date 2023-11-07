<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Shopping;
use Illuminate\Http\Request;
use App\Models\Theme;

use Illuminate\Support\Facades\Auth;

class CheckShopping extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $shop = Shopping::where('user_id', Auth::user()->id)->where('status', 0)->get();
            $db =  $shop->sum('jumlah_harga');
        foreach ($shop as $key) {
            if ($key->status == 0){
                \Midtrans\Config::$serverKey = 'SB-Mid-server-nZLapjhFwbJb6OkdVZPlcFLq';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

                $items = Theme::where('id', $key->theme_id)->firstOrFail();
                $params = array(
                    'transaction_details' => array(
                        'order_id' => rand(),
                        'gross_amount' => $db,
                    ),
                    'item_details' => array(
                        
                        [
                            "id" => $key->id,
                            "price" => $items->price,
                            "quantity" =>  '1',
                            "name" => $items->name_theme
                        ],
                    ),
                    'customer_details' => array(
                        'first_name' => 'budi',
                        'last_name' => '',
                        'email' => 'budi.pra@example.com',
                        'phone' => '0545845845',
                    ),
                );
            }
        $snapToken = \Midtrans\Snap::getSnapToken($params);
            
        return view('users.check_out', compact('shop', 'db', 'snapToken'));
        }
        return view('users.no_check-out');

        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public function pay(Request $request){
        return $request;
    }
}
