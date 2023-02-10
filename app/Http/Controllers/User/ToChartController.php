<?php

namespace App\Http\Controllers\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopping;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
class ToChartController extends Controller
{
    public function __invoke(Request $request){
        try {
            $id = $request->id;
            $theme = Theme::where('id', $id)->first();
            $shopp = new Shopping();
            $shopp->theme_id = $id;
            $shopp->user_id = Auth::id();
            $shopp->jumlah_harga = $theme->price;
            $test = $shopp->save();
            Alert::success('Congrats', 'You\'ve Successfully Buy');
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
