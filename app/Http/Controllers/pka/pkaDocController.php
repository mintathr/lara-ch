<?php

namespace App\Http\Controllers\pka;

use App\Http\Controllers\Controller;
use App\Models\pka\PkaDoc;
use Illuminate\Http\Request;

class pkaDocController extends Controller
{
    public function dashboard()
    {
        $tpg_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'TPG')
                    ->where('program', '=', 'Rutin')
                    ->sum('penerimaan');
        $tpg_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'TPG')
                    ->where('program', '=', 'Rutin')
                    ->sum('pengeluaran');
        $tpg_non_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'TPG')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('penerimaan');
        $tpg_non_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'TPG')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('pengeluaran');
        $tpg_proyek_penerimaan = PkaDoc::where('sheet_komisi', '=', 'TPG')
                    ->where('program', '=', 'Proyek')
                    ->sum('penerimaan');
        $tpg_proyek_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'TPG')
                    ->where('program', '=', 'Proyek')
                    ->sum('pengeluaran');

        return view('pka_doc.dashboard', [
            'tpg_rutin_penerimaan'      => $tpg_rutin_penerimaan,
            'tpg_rutin_pengeluaran'      => $tpg_rutin_pengeluaran,
            'tpg_non_rutin_penerimaan'      => $tpg_non_rutin_penerimaan,
            'tpg_non_rutin_pengeluaran'      => $tpg_non_rutin_pengeluaran,
            'tpg_proyek_penerimaan'      => $tpg_proyek_penerimaan,
            'tpg_proyek_pengeluaran'      => $tpg_proyek_pengeluaran,
        ]);
    }
    public function index()
    {
        $pkadocs = PkaDoc::get();
        return view('pka_doc.index', compact('pkadocs'));
        
    }

    public function show(PkaDoc $pkadoc)
    {
        $pkadoc = PkaDoc::where('no_pka', $pkadoc->no_pka)->first();
        return view('pka_doc.show', compact('pkadoc'));
    }
}
