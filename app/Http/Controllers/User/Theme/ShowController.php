<?php

namespace App\Http\Controllers\User\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
class ShowController extends Controller
{
    public function __invoke()
    {
       $themes = Theme::all();
        return view('users.products', compact('themes'));
    }
}
