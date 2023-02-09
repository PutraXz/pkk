<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
class ShowController extends Controller
{
    public function __invoke(){
        $themes = Theme::all();
        return view('admin.theme', compact('themes'));
    }
}
