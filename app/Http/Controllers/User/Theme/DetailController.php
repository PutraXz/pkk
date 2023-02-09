<?php

namespace App\Http\Controllers\User\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
class DetailController extends Controller
{
    public function __invoke($id)
    {
        $nani = Theme::whereId($id)->first();
        // dd($nani);
        // $user = Auth::user();
        // dd($user->id);
        return view('users.product_detail', compact('nani'));
    }
}
