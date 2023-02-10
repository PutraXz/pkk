<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmShopping extends Controller
{
    public function __invoke()
    {
        $shop = Shopping::where('user_id', Auth::user()->id)->where('status', 0)->firstOrFail();
        $shop->status = 1;
        $shop->update();
        return back();
    }
}
