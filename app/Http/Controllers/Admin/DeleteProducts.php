<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class DeleteProducts extends Controller
{
    public function __invoke($id)
    {
        $product =  Products::find($id);
        $product->delete();
        return back();
    }
}
