<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductDetail extends Controller
{
    public function __invoke($id)
    {
        $nani = Products::whereId($id)->first();
        // dd($nani);
        // $user = Auth::user();
        // dd($user->id);
        return view('users.product_detail', compact('nani'));
    }
}
