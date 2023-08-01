<?php

namespace App\Http\Controllers;

use App\Models\{Jemat,Regency};
use Illuminate\Http\Request;
use App\Traits\{
    HelperListTrait,
    HelperMonthTrait
};
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    use HelperMonthTrait, HelperListTrait;
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

    public function handleJemat()
    {
        $jemat = Jemat::where('no_induk', Auth::user()->email)->first();
        $kode_hub_keluarga = substr($jemat->no_induk,-2);
        
/* 01	Kepala Keluarga
02	Istri
31	Anak ke 1
32	Anak ke 2
3x	dst
04	Orang Tua
05	Cucu
06	Kakak/ Adik Kandung
07	Menantu
08	Family Lain */

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
        
        #$provinces = Province::whereIn('id', array(31, 32, 36))->pluck('name', 'id');
        $regencies = Regency::whereIn('id', array(3174,3171,3172,3173,3175,3275,3276,3671,3674))->orderBy('name')->pluck('name', 'id');
        
        $pendidikan = $this->listKategori()['pendidikan'];
        $gol_dar    = $this->listKategori()['gol_dar'];
        return view('jemat.home', compact('jemat', 'hub_kel', 'pendidikan', 'gol_dar', 'regencies'));
    }

    public function updateJemat(Request $request, $id)
    {
        $messages = [
            #'nama_lengkap.required'             => 'Nama Harus Diisi!',
            #'nama_lengkap.regex'                => 'Format Salah',
            'tempat_lahir.required'             => 'Tempat Lahir Harus Diisi!',
            'tempat_lahir.regex'                => 'Format Salah',
            'tgl_lahir.required'                => 'Tanggal Lahir Harus Diisi!',
            'tempat_baptis.required'            => 'Tempat Baptis Harus Diisi!',
            'tempat_baptis.regex'               => 'Format Salah',
            'tgl_baptis.required'               => 'Tanggal Baptis Harus Diisi!',
            'tempat_sidi.required'              => 'Tempat Sidi Harus Diisi!',
            #'tempat_sidi.regex'                 => 'Format Salah',
            #'tgl_sidi.required'                 => 'Tanggal Sidi Harus Diisi!',
            #'tgl_nikah_gereja.required'         => 'Tanggal Nikah Gereja Harus Diisi!',
            #'tgl_nikah_sipil.required'          => 'Tanggal Nikah Sipil Harus Diisi!',
            #'pendidikan_terakhir.required'      => 'Pendidikan Terakhir Harus Diisi!',
            #'golongan_darah.required'           => 'Golongan Darah Harus Diisi!',
            'jenis_kelamin.required'            => 'Jenis Kelamin Harus Diisi!',
            'sektor.required'                   => 'Sektor Harus Diisi!',
        ];

        $request->validate([
            #'nama_lengkap'      => 'required|regex:/(^([a-zA-Z0-9, ]+)(\d+)?$)/u',
            'tempat_lahir'      => 'required|regex:/(^([a-zA-Z0-9, ]+)(\d+)?$)/u',
            'tgl_lahir'         => 'required',
            #'tempat_baptis'     => 'required|regex:/(^([a-zA-Z0-9, ]+)(\d+)?$)/u',
            'tgl_baptis'        => 'required',
            #'tempat_sidi'       => 'required|regex:/(^([0-9]+)(\d+)?$)/u|min:10|max:10',
            #'tgl_sidi'          => 'required',
            #'tgl_nikah_gereja'  => 'required',
            #'tgl_nikah_sipil'   => 'required',
            #'pendidikan_terakhir' => 'required',
            #'golongan_darah'    => 'required',
            'jenis_kelamin'     => 'required',
            'sektor'            => 'required',

        ], $messages);

        $jemat = Jemat::findOrFail($id);
        #$jemat->nama_lengkap = $request->nama_lengkap;
        #$jemat->save();
        try {
            $jemat->update($request->all());
            Alert::toast('Data Anda Berhasil Di Update.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        
        return redirect()->route('jemat.upload.create');

    }

    public function editAlamat(Jemat $jemat)
    {
        $data = Jemat::FindOrFail($jemat->id);
        $regencies = Regency::whereIn('id', array(3174,3171,3172,3173,3175,3275,3276,3671,3674))->orderBy('name')->pluck('name', 'id');

        return view('jemat.edit_alamat', compact('data', 'regencies'));
    }

    public function updateAlamat(Request $request, $id)
    {
        $jemat = Jemat::findOrFail($id);
        
        try {
            $jemat->update($request->all());
            Alert::toast('Data Alamat Berhasil Di Update.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        
        return redirect()->route('jemat.profile');
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
        $pkbMaleNoMarriageUsers       = Jemat::activePkbPkpNoMarriage()->where('jenis_kelamin', '=', 'L')->get();
        $pkpFemaleNoMarriageUsers     = Jemat::activePkbPkpNoMarriage()->where('jenis_kelamin', '=', 'P')->get();
        $gpMaleUsers        = Jemat::activeGp()->where('jenis_kelamin', '=', 'L')->get();
        $gpFemaleUsers      = Jemat::activeGp()->where('jenis_kelamin', '=', 'P')->get();
        $ptMaleUsers        = Jemat::activePt()->where('jenis_kelamin', '=', 'L')->get();
        $ptFemaleUsers      = Jemat::activePt()->where('jenis_kelamin', '=', 'P')->get();
        $paMaleUsers        = Jemat::activePa()->where('jenis_kelamin', '=', 'L')->get();
        $paFemaleUsers        = Jemat::activePa()->where('jenis_kelamin', '=', 'P')->get();

        $sum_pkluMaleUsers      = $pkluMaleUsers->count();
        $sum_pkluFemaleUsers    = $pkluFemaleUsers->count();
        $sum_pkbMaleUsers       = $pkbMaleUsers->count()+$pkbMaleNoMarriageUsers->count();
        $sum_pkpFemaleUsers     = $pkpFemaleUsers->count()+$pkpFemaleNoMarriageUsers->count();
        $sum_pkbMaleNoMarriageUsers       = $pkbMaleNoMarriageUsers->count();
        $sum_pkpFemaleNoMarriageUsers     = $pkpFemaleNoMarriageUsers->count();
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
