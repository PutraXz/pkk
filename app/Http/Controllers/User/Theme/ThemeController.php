<?php

namespace App\Http\Controllers\User\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __invoke()
    {
       $themes = Theme::all();
        return view('users.products', compact('themes'));
    }
}
