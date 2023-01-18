<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowOrder extends Controller
{
    public function __invoke()
    {
       $orders = Shopping::where('user_id', Auth::id())->where('status', 1 )->get();
       $carbon = Carbon::now()->format('m/d/Y') ;
     
       return view('users.order', compact('orders'));
    }
}
