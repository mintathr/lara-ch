<?php

namespace App\Http\Controllers\pt;

use App\Models\Jemat;
use Illuminate\Http\Request;
use App\Traits\{HelperMonthTrait, HelperListTrait};
use App\Http\Controllers\Controller;

class PtJematController extends Controller
{
    use HelperMonthTrait, HelperListTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function teruna()
    {
        $jemats         = Jemat::activePt()->orderBy('nama_lengkap', 'asc')->get();
        $ptMaleUsers    = Jemat::activePt()->where('jenis_kelamin', '=', 'L')->get();
        $ptFemaleUsers  = Jemat::activePt()->where('jenis_kelamin', '=', 'P')->get();

        return view('pt.jemat.teruna', [
            'jemats'             => $jemats,
            'ptMaleUsers'        => $ptMaleUsers,
            'ptFemaleUsers'      => $ptFemaleUsers,
            'dt'            => $this->cekMonth()['dt']
        ]);
    }

    public function pelayanPengurusTeruna()
    {
        #dd($this->listKategori()['pelayanPt'][0]['nama_pelayan']);
        $jematlist = Jemat::whereIn('no_induk', [
            $this->listKategori()['pelayanPt'][0]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][1]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][2]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][3]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][4]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][5]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][6]['nik_pelayan'],
            $this->listKategori()['pelayanPt'][7]['nik_pelayan'],
            ])->get();
        $pengurusPt = Jemat::where('pengurus_pt', '=', 'y')->get();
        $pelayanPt  = Jemat::where('pelayan_pt', '=', 'y')->get();
        return view('pt.jemat.pelayan_pengurus', [
            #'jemats'         => $jemats,
            'pengurusPt'    => $pengurusPt,
            'pelayanPt'    => $pelayanPt,
            /* 'pelayanPt'            => $this->listKategori()['pelayanPt'],
            'pengurusPt'            => $this->listKategori()['pengurusPt'] */
        ]);
    }
    /* public function pelayan(Request $request)
    {

        dd($request->nama_lengkap);
    } */
}
