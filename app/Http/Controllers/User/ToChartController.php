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
            $theme = Theme::findOrFail($request->id);
            Shopping::create([
                'theme_id' => $theme->id,
                'user_id' => Auth::id(),
                'jumlah_harga' => $theme->price,
            ]);
            Alert::success('Congrats', 'You\'ve Successfully Bought');
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}