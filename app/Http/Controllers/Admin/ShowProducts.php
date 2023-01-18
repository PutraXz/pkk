<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ShowProducts extends Controller
{
    public function __invoke()
    {
        $products = Products::all();
        return view('admin.product', compact('products'));
    }
}
