<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use Illuminate\Http\Request;

class DeleteShopping extends Controller
{
    public function __invoke($id)
    {
        $shopp =  Shopping::find($id);
        $shopp->delete();
        return back();
    }
}
