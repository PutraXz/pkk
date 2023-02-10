<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Products;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function __invoke(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-nZLapjhFwbJb6OkdVZPlcFLq';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 13000,
            ),
            'item_details' => array(
                [
                    "id" => 'a01',
                    "price" => '7000',
                    "quantity" => 1,
                    "name" => "Apple"
                ],
                [
                    "id" => "b02",
                    "price" => '3000',
                    "quantity" => 2,
                    "name" => "Orange"
                ]
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('payment', ['snap_token' => $snapToken]);
    }
    public function pay(Request $request){
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->status_code = $json->status_code;
        $order->status_message = $json->status_code;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->transaction_status = $json->transaction_status;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $order->user_id = Auth::user()->id;
        $shop = Shopping::where('user_id', Auth::user()->id)->where('status', 0)->firstOrFail();
        $shop->status = 1;
        $shop->update();
        return $order->save() ? redirect(url('/order'))->with('alert-success', 'order berhasil') : redirect(url('/order'))->with('alert-failed', 'order gagal');
    }
    public function callback(Request $request){
        $json = json_decode($request->getContent());
        $serverKey = 'SB-Mid-server-nZLapjhFwbJb6OkdVZPlcFLq';
        $hashed = hash("sha512", $json->order_id.$json->status_code.$json->gross_amount.$serverKey);
        
        if($hashed != $json->signature_key){
            return abort(404);
        }
        // success
        $order = Order::where('order_id', $json->order_id)->first();
        return $order->update(['transaction_status' => $json->transaction_status]);
    }
}
