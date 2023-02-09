<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $theme =  Theme::find($id);
        $theme->delete();
        return back();
    }
}
