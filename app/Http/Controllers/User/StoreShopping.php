<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Theme;
class StoreShopping extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $theme = Theme::find($id);
        $shopp = new Shopping();
        $shopp->theme_id = $id;
        $shopp->user_id = Auth::id();
        $shopp->jumlah_harga = $theme->price;
        $test = $shopp->save();
        return redirect('check-out');
    }
}
