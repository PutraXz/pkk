<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckShopping extends Controller
{
    public function __invoke()
    {
        $shop = Shopping::where('user_id', Auth::user()->id)->where('status', 0)->get();
        $db =  $shop->sum('jumlah_harga');
        return view('users.check_out', compact('shop', 'db'));
    }
}
