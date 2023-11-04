<?php

namespace App\Http\Controllers\User\Wedding;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WeddingRequest;
use Illuminate\Support\Str;
use App\Models\Wedding;
use App\Models\MultipleUpload;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class WeddingUpload extends Controller
{
    public function __invoke(Request $request){
        try {
            $slug = Str::slug($request->url, '-');
            $timestamp = round(microtime(true) * 1000);
    
            // Move the main images
            $filename = $timestamp . '.' . $request->image->getClientOriginalName();
            $groom = $timestamp . '.' . $request->photo_groom->getClientOriginalName();
            $bride = $timestamp . '.' . $request->photo_bride->getClientOriginalName();
            
            $request->image->move(public_path('foto_pengantin'), $filename);
            $request->photo_groom->move(public_path('foto_pengantin'), $groom);
            $request->photo_bride->move(public_path('foto_pengantin'), $bride);
    
            $weddingData = [
                'name_url' => $slug,
                'title' => $request->url,
                'name_groom' => $request->name_groom,
                'name_bride' => $request->name_bride,
                'child_groom' => $request->child_groom,
                'father_groom' => $request->father_groom,
                'mother_groom' => $request->mother_groom,
                'child_bride' => $request->child_bride,
                'father_bride' => $request->father_bride,
                'mother_bride' => $request->mother_bride,
                'image' => $filename,
                'date_count' => $request->date_count,
                'theme_name' => $request->theme,
                'photo_groom' => $groom,
                'photo_bride' => $bride,
            ];
            
            $wedding = Wedding::create($weddingData);
    
            // Move additional files
            $files = [];
            foreach ($request->filename as $file) {
                $filename = $timestamp . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                $file->move(base_path('public_html/images/data-images'), $filename);
                $files[] = [
                    'filename' => $filename,
                    'name_url' => $slug,
                ];
            }

            // add data photo
            Multipleupload::insert($files);
            // change status on shopping
            Shopping::where('user_id', Auth::id())->firstOrFail()->update(['status' => 2]);

            Alert::success('Congrats', 'You\'ve Successfully Added Data');
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }    
}
