<?php

namespace App\Http\Controllers;

use App\Models\Jemat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function handleAdmin()
    {
        #$b = Request::ip();
        #$a = $this->server->get('REMOTE_ADDR');
        /* $d = request()->user();
        $c = request()->ip();
        dd($c,$d); */
        
        /* $dateOfBirth = '1993-07-02';
        $years = Carbon::parse($dateOfBirth)->age;
        $dt = $this->cekMonth()['dt']; */
        
        /* $a = Jemat::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) >= 29')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) <= 30')
            ->orWhereNotNull('tgl_nikah_gereja')
            ->where('jenis_kelamin', '=', 'L')
            ->get(); */
            /* $a        = Jemat::activePkbPkp()->get();
            dd($a); */

        $sumAll          = Jemat::count();
        $pkluMaleUsers      = Jemat::activePklu()->where('jenis_kelamin', '=', 'L')->get();
        $pkluFemaleUsers    = Jemat::activePklu()->where('jenis_kelamin', '=', 'P')->get();
        $pkbMaleUsers       = Jemat::activePkbPkp()->where('jenis_kelamin', '=', 'L')->get();
        $pkpFemaleUsers     = Jemat::activePkbPkp()->where('jenis_kelamin', '=', 'P')->get();
        $gpMaleUsers        = Jemat::activeGp()->where('jenis_kelamin', '=', 'L')->get();
        $gpFemaleUsers      = Jemat::activeGp()->where('jenis_kelamin', '=', 'P')->get();
        $ptMaleUsers        = Jemat::activePt()->where('jenis_kelamin', '=', 'L')->get();
        $ptFemaleUsers      = Jemat::activePt()->where('jenis_kelamin', '=', 'P')->get();
        $paMaleUsers        = Jemat::activePa()->where('jenis_kelamin', '=', 'L')->get();
        $paFemaleUsers        = Jemat::activePa()->where('jenis_kelamin', '=', 'P')->get();

        $sum_pkluMaleUsers      = $pkluMaleUsers->count();
        $sum_pkluFemaleUsers    = $pkluFemaleUsers->count();
        $sum_pkbMaleUsers       = $pkbMaleUsers->count();
        $sum_pkpFemaleUsers     = $pkpFemaleUsers->count();
        $sum_gpMaleUsers        = $gpMaleUsers->count();
        $sum_gpFemaleUsers      = $gpFemaleUsers->count();
        $sum_ptMaleUsers        = $ptMaleUsers->count();
        $sum_ptFemaleUsers      = $ptFemaleUsers->count();
        $sum_paMaleUsers      = $paMaleUsers->count();
        $sum_paFemaleUsers      = $paFemaleUsers->count();
        
        $pelkatLists = [
            ['pelkat' => 'PKLU', 'jml_laki' => $sum_pkluMaleUsers, 'jml_perempuan' => $sum_pkluFemaleUsers],
            ['pelkat' => 'PKB', 'jml_laki' => $sum_pkbMaleUsers, 'jml_perempuan' => ''],
            ['pelkat' => 'PKP', 'jml_laki' => '', 'jml_perempuan' => $sum_pkpFemaleUsers],
            ['pelkat' => 'GP', 'jml_laki' => $sum_gpMaleUsers, 'jml_perempuan' => $sum_gpMaleUsers],
            ['pelkat' => 'PT', 'jml_laki' => $sum_ptMaleUsers, 'jml_perempuan' => $sum_ptMaleUsers],
        ];
        #dd($pelkatLists[0]['pelkat']);

        /* $pkluMaleUsers = Jemat::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 60')
            ->where('jenis_kelamin', '=', 'L')
            ->get();
        $pkbUsers = Jemat::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 20')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 61')
            ->orWhereNotNull('tgl_nikah_gereja')
            ->where('jenis_kelamin', '=', 'L')
            ->get();
        $sum_pkb = $pkbUsers->count();
        $pkpUsers = Jemat::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 20')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 61')
            ->orWhereNotNull('tgl_nikah_gereja')
            ->where('jenis_kelamin', '=', 'P')
            ->get();
        $sum_pkp = $pkpUsers->count();
        $gpUsers = Jemat::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 18')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 36')
            ->WhereNull('tgl_nikah_gereja')
            ->get();
        $sum_gp = $gpUsers->count(); */

        
        #    dd($a[0]->getAgeAttribute());
        return view('sysadmin.handleAdmin', [
            'sum_pkluMaleUsers'         => $sum_pkluMaleUsers,
            'sum_pkluFemaleUsers'         => $sum_pkluFemaleUsers,
            'sum_pkbMaleUsers'         => $sum_pkbMaleUsers,
            'sum_pkpFemaleUsers'     => $sum_pkpFemaleUsers,
            'sum_gpMaleUsers'        => $sum_gpMaleUsers,
            'sum_gpFemaleUsers'      => $sum_gpFemaleUsers,
            'sum_ptMaleUsers'        => $sum_ptMaleUsers,
            'sum_ptFemaleUsers'      => $sum_ptFemaleUsers,
            'sum_paMaleUsers'        => $sum_paMaleUsers,
            'sum_paFemaleUsers'      => $sum_paFemaleUsers,
            'sumAll'      => $sumAll,
            'pelkatLists'      => $pelkatLists,
        ]);
    }

}
