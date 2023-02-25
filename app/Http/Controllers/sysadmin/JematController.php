<?php

namespace App\Http\Controllers\sysadmin;

use Carbon\Carbon;
use App\Models\Jemat;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Traits\HelperMonthTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class JematController extends Controller
{
    use HelperMonthTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jemats = Jemat::get();
        return view('sysadmin.jemat.index', [
            'jemats'    => $jemats,
        ]);
    }

    public function cekHbd()
    {
        /* $a = $this->cekMonth()['dt'];
        $b = explode('-', $this->cekMonth()['dt'])[2];
        dd($b);
         */
        $from = $this->cekMonth()['from_sunday_month'].'-'.$this->cekMonth()['from_sunday_date'];
        $to = $this->cekMonth()['to_saturday_month'].'-'.$this->cekMonth()['to_saturday_date'];
        
        $cekHbd = Jemat::select('nama_lengkap', 'tgl_lahir')
            ->whereBetween(DB::raw("(DATE_FORMAT(tgl_lahir,'%m-%d'))"), [$from,$to])
            ->get();
        
        $cekMarriage = Jemat::select('nama_lengkap', 'tgl_nikah_gereja')
            ->whereBetween(DB::raw("(DATE_FORMAT(tgl_nikah_gereja,'%m-%d'))"), [$from,$to])
            ->get();
        
        return view('sysadmin.jemat.cek_hbd', [
            'cekHbd'            => $cekHbd,
            'cekMarriage'       => $cekMarriage,
            'from_sunday_date'       => $this->cekMonth()['from_sunday_date'],
            'to_saturday_date'       => $this->cekMonth()['to_saturday_date'],
            'from_month_id'        => $this->cekMonth()['from_month_id'],
            'to_month_id'          => $this->cekMonth()['to_month_id'],
            'dt'            => $this->cekMonth()['dt']
        ]);
    }

    public function edit($id)
    {
        $decrypted = Crypt::decryptString($id);
        $jemat = Jemat::findOrFail($decrypted);
        return view('sysadmin.jemat.edit', [
            'jemat'     => $jemat,
            'id'        => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $decrypted = Crypt::decryptString($id);
        Jemat::findOrFail($decrypted);
        try {
            Jemat::where('id', $decrypted)
                ->update([
                    'tempat_lahir'      => $request->tempat_lahir,
                    'tempat_baptis'     => $request->tempat_baptis,
                    'tempat_sidi'       => $request->tempat_sidi,
                    'tgl_nikah_gereja'  => $request->tgl_nikah_gereja,
                    'nama_lengkap'      => $request->nama_lengkap,
                    'tgl_lahir'         => $request->tgl_lahir,
                    'tgl_baptis'        => $request->tgl_baptis,
                    'tgl_sidi'          => $request->tgl_sidi,
                ]);
            Alert::toast('Data Berhasil Di Ubah.', 'success')->width('25rem')->padding('5px');
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
            return redirect()->route('admin.jemat');
        }
        
    
}