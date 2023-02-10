<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wedding;
use App\Models\MultipleUpload;
class ShowWedding extends Controller
{
    public function __invoke($slug){
        $weddings = Wedding::where('name_url', $slug)->firstOrFail();
        $gallery = MultipleUpload::where('name_url', $slug)->get();
        return view('themes/'.$weddings->theme_name, compact('weddings', 'gallery'));
    }
}
