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
        $user = Auth::user();
        $user->Shopping::where('status', 0)->firstOrFail()->update(['status' => 1]);
        return back();
    }
}
