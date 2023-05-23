<?php

namespace App\Http\Controllers\sysadmin;

use Carbon\Carbon;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $docs = Document::get();
        return view('sysadmin.lampiran.index', [
            'docs'    => $docs,
        ]);
    }

    public function create()
    {
        return view('sysadmin.lampiran.upload_file');
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
            
            $file->storeAs('public/lampiran_lampiran/',$replace_name);

            #$file->storeAs('public/tmp/' . $folder, $new_name);
            #$file->storeAs('public/upload_sanggah/' . $folder, $new_name);
            #$file->move(public_path('upload_sanggah'), $new_name);

            #Storage::disk('upload_sanggah')->put($filename, $new_name);

            Document::create([
                'user_id'       => Auth::user()->id,
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
        $cek        = Document::select('folder', 'filename')->where('folder', $x)->first();

        $file_path  = storage_path() . "/app/public/lampiran_lampiran/" . $cek->filename;

        if(file_exists($file_path)){
            Document::where('folder', $x)->delete();
            File::delete($file_path);
        }else{
            return Redirect::back()->with('error', 'File Tidak Ditemukan');
        }
    }

    public function getDownload($temporaryfile)
    {
        #$file = public_path() . "/upload_sanggah/" . $temporaryfile;
        $file = storage_path() . "/app/public/lampiran_lampiran/" . $temporaryfile;

        $headers = [
            'Content-Type' => 'image/jpg',
            'Content-Type' => 'image/jpeg',
            'Content-Type' => 'image/png',
            'Content-Type' => 'application/pdf',
            //'Content-Type' => 'application/vnd.ms-excel',
        ];

        return response()->download($file, $temporaryfile, $headers);
    }
}
