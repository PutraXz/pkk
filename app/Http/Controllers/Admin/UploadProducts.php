<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class UploadProducts extends Controller
{
    public function __invoke(StoreUploadRequest $request)
    {
        $filename = time().'.'.$request->file->getClientOriginalName();
            $request->file->move(public_path('products'), $filename);
            $reqEnd = $request->toArray();
            $reqEnd['file'] = $filename;
            $reqEnd['slug'] = str_slug($request->title);
            Products::create($reqEnd);
            return back();
    }
}
