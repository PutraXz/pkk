<?php

namespace App\Http\Controllers\User\Wedding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Greeting;
class GreetStore extends Controller
{
    public function __invoke(Request $request){
        Greeting::insert([
            'name_url' => $request->name_url,
            'from' => request('from'),
            'type' => request('type'),
        ]);

        return redirect()->back();
    }
}
