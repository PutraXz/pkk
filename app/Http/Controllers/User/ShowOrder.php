<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shopping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowOrder extends Controller
{
    public function __invoke()
    {
        $userId = Auth::id();
        $orders = Shopping::where('user_id', $userId)->where('status', 1)->get();
        $orderz = Order::where('user_id', $userId)->get();
        return view('users.order', compact('orders', 'orderz'));
    }
}
