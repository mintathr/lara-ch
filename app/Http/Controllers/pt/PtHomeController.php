<?php

namespace App\Http\Controllers\pt;

use App\Models\Jemat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PtHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jemats         = Jemat::activePt()->orderBy('nama_lengkap', 'asc')->get();
        $ptMaleUsers    = Jemat::activePt()->where('jenis_kelamin', '=', 'L')->get();
        $ptFemaleUsers  = Jemat::activePt()->where('jenis_kelamin', '=', 'P')->get();
        $ptMaleDwi      = Jemat::activePtDwi()->where('jenis_kelamin', '=', 'L')->get();
        $ptFemaleDwi    = Jemat::activePtDwi()->where('jenis_kelamin', '=', 'P')->get();
        $ptMaleEka      = Jemat::activePtEka()->where('jenis_kelamin', '=', 'L')->get();
        $ptFemaleEka    = Jemat::activePtEka()->where('jenis_kelamin', '=', 'P')->get();
        
        $sum_ptMaleUsers      = $ptMaleUsers->count();
        $sum_ptFemaleUsers    = $ptFemaleUsers->count();
        $sum_ptMaleDwi        = $ptMaleDwi->count();
        $sum_ptFemaleDwi      = $ptFemaleDwi->count();
        $sum_ptMaleEka        = $ptMaleEka->count();
        $sum_ptFemaleEka      = $ptFemaleEka->count();
        
        $pelkatLists = [
            ['pelkat' => 'PT', 'jml_laki' => $sum_ptMaleUsers, 'jml_perempuan' => $sum_ptMaleUsers],
        ];

        #$jemat = Jemat::where('no_induk', Auth::user()->email)->first();

        return view('pt.home', [
            'jemats'    => $jemats,
            'sum_ptMaleUsers'        => $sum_ptMaleUsers,
            'sum_ptFemaleUsers'      => $sum_ptFemaleUsers,
            'sum_ptMaleDwi'      => $sum_ptMaleDwi,
            'sum_ptFemaleDwi'      => $sum_ptFemaleDwi,
            'sum_ptMaleEka'      => $sum_ptMaleEka,
            'sum_ptFemaleEka'      => $sum_ptFemaleEka,
        ]);
    }
}
