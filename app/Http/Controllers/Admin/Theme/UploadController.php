<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Http\Requests\ThemeRequest;
use Illuminate\Support\Str;
class UploadController extends Controller
{
    public function __invoke(ThemeRequest $request){
        $filename = time().'.'.$request->preview->getClientOriginalName();
            $request->preview->move(public_path('themes'), $filename);
            $reqEnd = $request->toArray();
            $reqEnd['preview'] = $filename;
            $reqEnd['kode_theme'] = Str::random(8);
            Theme::create($reqEnd);
            return back();
    }
}
