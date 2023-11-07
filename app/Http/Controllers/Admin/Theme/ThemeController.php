<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeRequest;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.theme', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(ThemeRequest $request)
    {
        $filename = time().'.'.$request->preview->getClientOriginalName();
            $request->preview->move(public_path('themes'), $filename);
            $reqEnd = $request->toArray();
            $reqEnd['preview'] = $filename;
            $reqEnd['kode_theme'] = Str::random(8);
            Theme::create($reqEnd);
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $nani = Theme::whereId($id)->first();
        // dd($nani);
        return view('admin.edit-theme', compact('nani'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThemeRequest $request, $id)
    {
        $product = Theme::find($id);
        $reqEnd = $request->toArray();
        $product->update($reqEnd);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme =  Theme::find($id);
        $theme->delete();
        return back();
    }
}
