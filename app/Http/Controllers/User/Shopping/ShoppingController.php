<?php

namespace App\Http\Controllers\User\Shopping;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shopping;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $orders = Shopping::where('user_id', $userId)->where('status', 1)->get();
        $orderz = Order::where('user_id', $userId)->get();
        return view('users.order', compact('orders', 'orderz'));
    }

    
    public function confirm()
    {
        $user = Auth::user();
        $user->Shopping::where('status', 0)->firstOrFail()->update(['status' => 1]);
        return back();
    }

    
    public function destroy($id)
    {
        Shopping::findOrFail($id)->delete();
        return back();
    }
}
