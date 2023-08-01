<?php

namespace App\Http\Controllers\jemat;

use App\Models\Jemat;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jemat      = Jemat::where('no_induk', Auth::user()->email)->first();
        $tempFiles  = TemporaryFile::where('user_id', Auth::user()->id)->get();
        $family     = Jemat::where('nama_keluarga', $jemat->nama_keluarga)->get();

        $kode_hub_keluarga = substr($jemat->no_induk,-2);
        
        if($jemat->hubungan_keluarga == 'KK'){
            $hub_kel = 'Kepala Keluarga';
        }elseif($jemat->hubungan_keluarga == 'IS'){
            $hub_kel = 'Istri';
        }elseif($jemat->hubungan_keluarga == 'AN'){
            $hub_kel = 'Anak ke-'.$kode_hub_keluarga;
        }elseif($jemat->hubungan_keluarga == 'OT'){
            $hub_kel = 'Orang Tua';
        }elseif($jemat->hubungan_keluarga == 'CU'){
            $hub_kel = 'Cucu';
        }elseif($jemat->hubungan_keluarga == 'KA'){
            $hub_kel = 'Kakak/ Adik Kandung';
        }elseif($jemat->hubungan_keluarga == 'MN'){
            $hub_kel = 'Menantu';
        }elseif($jemat->hubungan_keluarga == 'FA'){
            $hub_kel = 'FA';
        }

        return view('jemat.profile', compact('jemat', 'hub_kel', 'tempFiles', 'family'));
    }

    public function getDownload($temporaryfile)
    {
        #$file = public_path() . "/upload_sanggah/" . $temporaryfile;
        $file = storage_path() . "/app/public/upload_file/" . $temporaryfile;

        $headers = [
            'Content-Type' => 'image/jpg',
            'Content-Type' => 'image/jpeg',
            'Content-Type' => 'image/png',
            'Content-Type' => 'application/pdf',
            //'Content-Type' => 'application/vnd.ms-excel',
        ];

        return response()->download($file, $temporaryfile, $headers);
    }

    public function updatePhoto(Request $request)
    {
        if($request->hasFile('photo_profile')){
            $filename           = $request->photo_profile->getClientOriginalName();
            $replace_name       = date('YmdHis').'_'.Auth::user()->name.'_'.$filename;

            $delete_file_before  = storage_path() . "/app/public/photo_profile/" . Auth::user()->photo_profile;
            if(file_exists($delete_file_before)){
                File::delete($delete_file_before);
            }

            $request->photo_profile->storeAs('public/photo_profile/',$replace_name);

            Auth()->user()->update(['photo_profile'=>$replace_name]);
        }
        Alert::toast('Photo Berhasil Di Ubah.', 'success')->width('25rem')->padding('5px');
        return redirect()->back();
    }
    
}
