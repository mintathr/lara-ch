<?php

namespace App\Http\Controllers\jemat;

use App\Models\Jemat;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
