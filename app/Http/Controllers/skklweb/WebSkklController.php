<?php

namespace App\Http\Controllers\skklweb;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\HelperMonthTrait;
use App\Models\skklweb\LinkUtube;
use App\Models\skklweb\Presbiters;
use App\Http\Controllers\Controller;

class WebSkklController extends Controller
{
    use HelperMonthTrait;

    public function index()
    {
        $linkUtube      = LinkUtube::first();
        $tgl            = Carbon::parse($linkUtube->tanggal);
        $formatMonth    = $this->cekMonth()['list_month'][(int)$tgl->format('m')]['day'];
        $formatDate     = $tgl->format('d') . ' ' . $formatMonth . ' ' . $tgl->format('Y');
        
        return view('skklweb.index', [
            'linkUtube'     => $linkUtube,
            'tgl'           => $tgl,
            'formatMonth'   => $formatMonth,
            'tahun'         => $tgl->format('Y'),
            'formatDate'    => $formatDate,
        ]);
    }

    public function diaken()
    {
        $presbiters     = Presbiters::activediaken()->get();
        return view('skklweb.diaken', [
            'presbiters'    => $presbiters,
        ]);
    }

    public function majelis()
    {
        $presbiters     = Presbiters::activemajelis()->get();

        return view('skklweb.majelis', [
            'presbiters'    => $presbiters,
        ]);
    }

    public function komisiIl()
    {
        $presbiters     = Presbiters::activeil()->get();

        return view('skklweb.komisi_il', [
            'presbiters'    => $presbiters,
        ]);
    }

    public function pelkatPt()
    {
        #$presbiters     = Presbiters::activeil()->get();

        return view('skklweb.pelkat_pt', [
            #'presbiters'    => $presbiters,
        ]);
    }
}
