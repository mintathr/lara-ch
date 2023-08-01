<?php

namespace App\Http\Controllers\jemat;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('jemat.upload_file');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('fileUpload')){
            $file               = $request->file('fileUpload');
            $filename           = $file->getClientOriginalName();
            $folder             = uniqid() . '-' . now()->timestamp;
            $td                 = Carbon::now();
            $tanggal_sekarang   = $td->toDateString();
            #$new_name = $tanggal_sekarang . "_" . Auth::user()->user_id . "_" . $filename;
            $replace_name       = date('YmdHis'). ' ' . $filename;
            
            $file->storeAs('public/upload_file/',$replace_name);

            #$file->storeAs('public/tmp/' . $folder, $new_name);
            #$file->storeAs('public/upload_sanggah/' . $folder, $new_name);
            #$file->move(public_path('upload_sanggah'), $new_name);

            #Storage::disk('upload_sanggah')->put($filename, $new_name);

            TemporaryFile::create([
                'user_id'        => Auth::user()->id,
                'folder'        => $folder,
                'filename'      => $replace_name,
                
            ]);

            return $folder;
        }
        return '';
    
    }

    public function delete(Request $request)
    {
        $s          = $request->getContent();
        $x          = explode("<",$s);
        $cek        = TemporaryFile::select('folder', 'filename')->where('folder', $x)->first();

        $file_path  = storage_path() . "/app/public/upload_file/" . $cek->filename;

        if(file_exists($file_path)){
            TemporaryFile::where('folder', $x)->delete();
            File::delete($file_path);
        }else{
            return Redirect::back()->with('error', 'File Tidak Ditemukan');
        }
       
    }
}
