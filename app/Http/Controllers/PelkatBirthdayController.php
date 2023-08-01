<?php

namespace App\Http\Controllers;

use App\Models\Jemat;
use App\Traits\HelperMonthTrait;
use Illuminate\Support\Facades\DB;

class PelkatBirthdayController extends Controller
{
    use HelperMonthTrait;
    
    public function paHbd()
    {
        $sunday = $this->cekMonth()['sunday'];
        $end_sunday = $this->cekMonth()['end_sunday'];
        $sunday_date = $this->cekMonth()['from_sunday_date'];
        $from_sunday = $this->cekMonth()['from_sunday_month'].'-'.$this->cekMonth()['from_sunday_date'];
        $to_sunday = $this->cekMonth()['to_sunday_month'].'-'.$this->cekMonth()['to_sunday_date'];
        $from = $this->cekMonth()['from_sunday_month'].'-'.$this->cekMonth()['from_sunday_date'];
        $to = $this->cekMonth()['to_saturday_month'].'-'.$this->cekMonth()['to_saturday_date'];
        
        $cekHbd = Jemat::activepa()->select('nama_lengkap', 'tgl_lahir')
            ->whereBetween(DB::raw("(DATE_FORMAT(tgl_lahir,'%m-%d'))"), [$from_sunday,$to_sunday])
            ->orderBy(DB::raw("(DATE_FORMAT(tgl_lahir,'%m-%d'))"), 'ASC')
            ->get();
        
        return view('pa.hbd.index', [
            'cekHbd'               => $cekHbd,
            'from_sunday_date'     => $this->cekMonth()['from_sunday_date'],
            'to_sunday_date'       => $this->cekMonth()['to_sunday_date'],
            'from_month_id'        => $this->cekMonth()['from_month_id'],
            'to_month_id_sunday'   => $this->cekMonth()['to_month_id_sunday'],
            'dt'                   => $this->cekMonth()['dt']
            #'to_saturday_date'       => $this->cekMonth()['to_saturday_date'],
            #'to_month_id'          => $this->cekMonth()['to_month_id'],
        ]);
    }

    public function ptHbd()
    {
        $from_sunday = $this->cekMonth()['from_sunday_month'].'-'.$this->cekMonth()['from_sunday_date'];
        $to_sunday = $this->cekMonth()['to_sunday_month'].'-'.$this->cekMonth()['to_sunday_date'];
        
        $cekHbd = Jemat::activept()->select('nama_lengkap', 'tgl_lahir')
            ->whereBetween(DB::raw("(DATE_FORMAT(tgl_lahir,'%m-%d'))"), [$from_sunday,$to_sunday])
            ->orderBy(DB::raw("(DATE_FORMAT(tgl_lahir,'%m-%d'))"), 'ASC')
            ->get();
        
        return view('pt.hbd.index', [
            'cekHbd'               => $cekHbd,
            'from_sunday_date'     => $this->cekMonth()['from_sunday_date'],
            'to_sunday_date'       => $this->cekMonth()['to_sunday_date'],
            'from_month_id'        => $this->cekMonth()['from_month_id'],
            'to_month_id_sunday'   => $this->cekMonth()['to_month_id_sunday'],
            'dt'                   => $this->cekMonth()['dt']
            #'to_saturday_date'       => $this->cekMonth()['to_saturday_date'],
            #'to_month_id'          => $this->cekMonth()['to_month_id'],
        ]);
    }
}
