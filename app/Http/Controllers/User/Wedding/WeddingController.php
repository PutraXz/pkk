<?php

namespace App\Http\Controllers\User\Wedding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shopping;
class WeddingController extends Controller
{
    public function __invoke(){
        $thems = Shopping::where('status', 1)->where('user_id', Auth::user()->id)->get();
        $them = Shopping::where('status', 1)->where('user_id', Auth::user()->id)->first();
        if($them->status == 1){
        return view('users.dashboard-wedding', compact('thems'));
        }else{
            return view('errors.404');
        }
    }
}
