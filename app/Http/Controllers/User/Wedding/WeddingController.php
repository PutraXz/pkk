<?php

namespace App\Http\Controllers\User\Wedding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shopping;
class WeddingController extends Controller
{
    public function __invoke(){
        $getStatus= [];
        $get = Shopping::where('user_id', Auth::id())->get();
        foreach ($get as $status) {
            $getStatus = $status;
        }
        if($getStatus->status != 0){
            return view('users.dashboard-wedding', compact('getStatus'));
        }else{
            return view('errors.404');
        }
    }
}
