<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Http\Requests\ThemeRequest;
class EditController extends Controller
{
    public function __invoke($id)
    {
        $nani = Theme::whereId($id)->first();
        // dd($nani);
        return view('admin.edit-theme', compact('nani'));
    }
    public function update(ThemeRequest $request, $id){
        $product = Theme::find($id);
        $reqEnd = $request->toArray();
        $product->update($reqEnd);
        return back();
    }

}
