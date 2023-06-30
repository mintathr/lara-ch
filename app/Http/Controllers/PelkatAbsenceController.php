<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jemat;
use Illuminate\Http\Request;
use App\Models\PelkatAbsence;
use App\Traits\{HelperListTrait,HelperMonthTrait};
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PelkatAbsenceController extends Controller
{
    use HelperListTrait, HelperMonthTrait;

    public function __construct()
    {
        $this->dt       = Carbon::now();
        $this->dateNow  = $this->dt->toDateString(); 
    }

    public function absensiPa()
    {
        // cek, absen hanya bisa dilakukan di hari minggu
        $minggu = $this->cekMonth()['end_sunday']->toDateString();
        if($this->cekMonth()['dt'] == $minggu)
        {
            $cek = PelkatAbsence::where('keterangan', '=', 'pa')
                        ->where('tgl_ibadah', '=', $this->dateNow)
                        ->count();
                        #->exists();

            if ($cek > 0) {
                return view('pa.absence.has_create', [
                    'total'         => $cek,
                    'tgl_ibadah'    => $this->dt->format('d F Y'),
                ]);
            }else{
                $pa_pelayan  = Jemat::where('pelayan_pa', '=', 'y')->orderBy('nama_lengkap')->get();
                $pa_pengurus = Jemat::where('pengurus_pa', '=', 'y')->where('id', '<>', 242)->orderBy('nama_lengkap')->get(); // except aldo (pengurus & pelayan)
                $anggota_pa      = Jemat::activepa()
                    ->orderBy('nama_lengkap','asc')
                    ->get();
                    
                return view('pa.absence.create', [
                    'pa_pelayan'        => $pa_pelayan,
                    'pa_pengurus'       => $pa_pengurus,
                    'anggota_pa'            => $anggota_pa,
                ]);
            }
        }else{
            return view('pa.absence.disable_create');
        }
    }

    public function absensiPt()
    {
        $minggu = $this->cekMonth()['end_sunday']->toDateString();
        if($this->cekMonth()['dt'] == $minggu)
        {
            $cek = PelkatAbsence::where('keterangan', '=', 'pt')
                        ->where('tgl_ibadah', '=', $this->dateNow)
                        ->count();
                        #->exists();

            if ($cek > 0) {
                return view('pt.absence.has_create', [
                    'total'         => $cek,
                    'tgl_ibadah'    => $this->dt->format('d F Y'),
                ]);
            }else{
                $pt_pelayan  = Jemat::where('pelayan_pt', '=', 'y')->orderBy('nama_lengkap')->get();
                $pt_pengurus = Jemat::where('pengurus_pt', '=', 'y')->where('id', '<>', 309)->orderBy('nama_lengkap')->get(); // except aldo (pengurus & pelayan)
                $pt_eka      = Jemat::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 18')
                    ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 10')
                    ->orderBy('nama_lengkap','asc')
                    ->get();
                    
                return view('pt.absence.create', [
                    'pt_pelayan'        => $pt_pelayan,
                    'pt_pengurus'       => $pt_pengurus,
                    'pt_eka'            => $pt_eka,
                    #'pt_pelayan'    => $this->listKategori()['pelayanPt'],
                    #'pt_pengurus'   => $this->listKategori()['pengurusPt'],
                ]);
            }
        }else{
            return view('pa.absence.disable_create');
        }
    }

    public function searchAbsencePa(Request $request)
    {
        if(!empty($request->tanggal_pencarian)){
            $x = explode("/",$request->tanggal_pencarian);
            $fromDate   = $x[0];
            $toDate     = $x[1];
            
            $absences = PelkatAbsence::where('keterangan', '=', $request->keterangan)
                        ->whereBetween('tgl_ibadah', [$fromDate, $toDate])
                        ->orderByRaw('DAY(tgl_ibadah)')
                        ->get();
            return view('pa.absence.search', [
                    'tanggal_pencarian'     => $request->tanggal_pencarian,
                    'absences'              => $absences,
                    'fromDate'              => $fromDate,
                    'toDate'                => $toDate,
                ]);
        }else{
            return view('pa.absence.search');
        }
    }

    public function searchAbsencePt(Request $request)
    {
        if(!empty($request->tanggal_pencarian)){
            $x = explode("/",$request->tanggal_pencarian);
            $fromDate   = $x[0];
            $toDate     = $x[1];
            
            $absences = PelkatAbsence::where('keterangan', '=', $request->keterangan)
                        ->whereBetween('tgl_ibadah', [$fromDate, $toDate])
                        ->orderByRaw('DAY(tgl_ibadah)')
                        ->get();
            return view('pt.absence.search', [
                    'tanggal_pencarian'     => $request->tanggal_pencarian,
                    'absences'              => $absences,
                    'fromDate'              => $fromDate,
                    'toDate'                => $toDate,
                ]);
        }else{
            return view('pt.absence.search');
        }
    }

    public function store(Request $request)
    {
        $cek = PelkatAbsence::where('keterangan', '=', $request->keterangan)
                    ->where('tgl_ibadah', '=', $this->dateNow)
                    ->first();
        if ($cek === null) {
            $jemat_id      = $request->jemat_id;
            $tgl_ibadah    = $this->dateNow;
            $keterangan    = $request->keterangan;
            foreach($jemat_id as $key => $no)
            {
                $input['jemat_id'] = $no;
                $input['tgl_ibadah'] = $tgl_ibadah;
                $input['keterangan'] = $keterangan;
                PelkatAbsence::create($input);
            }
            Alert::toast('Data berhasil disubmit!', 'success');
            return redirect()->back();
        }else{
            Alert::toast('absensi sudah dibuat!', 'error');
            return view('pa.absence.has_create');
        }
    }
}

