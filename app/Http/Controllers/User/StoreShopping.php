<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreShopping extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $product = Products::find($id);
        $shopp = new Shopping();
        $shopp->product_id = $id;
        $shopp->user_id = Auth::id();
        $shopp->jumlah = $request->jumlah;
        $shopp->jumlah_harga = $product->price * $request->jumlah;
        $test = $shopp->save();
        return redirect('check-out');
    }
}
