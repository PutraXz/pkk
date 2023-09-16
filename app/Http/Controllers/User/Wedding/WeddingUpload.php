<?php

namespace App\Http\Controllers\User\Wedding;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WeddingRequest;
use Illuminate\Support\Str;
use App\Models\Wedding;
use App\Models\MultipleUpload;
class WeddingUpload extends Controller
{
    public function __invoke(Request $request){
        try {
            $filename = time().'.'.$request->image->getClientOriginalName();
            $request->image->move(public_path('foto_pengantin'), $filename);
            $groom = time().'.'.$request->photo_groom->getClientOriginalName();
            $request->photo_groom->move(public_path('foto_pengantin'), $groom);
            $bride = time().'.'.$request->photo_bride->getClientOriginalName();
            $request->photo_bride->move(public_path('foto_pengantin'), $bride);
            // $reqEnd = $request->toArray();
            // $reqEnd['image'] = $filename;
            // $reqEnd['theme_name'] = $request->theme;
            // $reqEnd['name_url'] = Str::slug($request->title, '-');
            // $test = Wedding::create($reqEnd);
           $wed = new Wedding();
           $wed->name_url = Str::slug($request->url, '-');
           $wed->title = $request->url;
           $wed->name_groom = $request->name_groom ;
           $wed->name_bride = $request->name_bride ;
           $wed->child_groom = $request->child_groom ;
           $wed->father_groom = $request->father_groom ;
           $wed->mother_groom = $request->mother_groom;
           $wed->child_bride = $request->child_bride ;
           $wed->father_bride = $request->father_bride ;
           $wed->mother_bride = $request->mother_bride ;
           $wed->image = $filename;
           $wed->date_count	 = $request->date_count	;
           $wed->theme_name = $request->theme;
           $wed->photo_groom = $groom;
           $wed->photo_bride = $bride;
           $wed->save();

                $files = [];
                foreach ($request->filename as $file) {
                    $filenames = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                    $file->move(base_path('public_html/images/data-images'), $filenames);
                    $files[] = [
                        'filename' => $file,
                        'name_url' => Str::slug($request->url, '-'),
                        'filename' => $filenames,
                    ];
                }
                Multipleupload::insert($files);
            Alert::success('Congrats', 'You\'ve Successfully Add Data');
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
