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

        $pelkes_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PELKES')
                    ->where('program', '=', 'Rutin')
                    ->sum('penerimaan');
        $pelkes_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PELKES')
                    ->where('program', '=', 'Rutin')
                    ->sum('pengeluaran');
        $pelkes_non_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PELKES')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('penerimaan');
        $pelkes_non_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PELKES')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('pengeluaran');
        $pelkes_proyek_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PELKES')
                    ->where('program', '=', 'Proyek')
                    ->sum('penerimaan');
        $pelkes_proyek_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PELKES')
                    ->where('program', '=', 'Proyek')
                    ->sum('pengeluaran');

        $germasa_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'GERMASA')
                    ->where('program', '=', 'Rutin')
                    ->sum('penerimaan');
        $germasa_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'GERMASA')
                    ->where('program', '=', 'Rutin')
                    ->sum('pengeluaran');
        $germasa_non_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'GERMASA')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('penerimaan');
        $germasa_non_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'GERMASA')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('pengeluaran');
        $germasa_proyek_penerimaan = PkaDoc::where('sheet_komisi', '=', 'GERMASA')
                    ->where('program', '=', 'Proyek')
                    ->sum('penerimaan');
        $germasa_proyek_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'GERMASA')
                    ->where('program', '=', 'Proyek')
                    ->sum('pengeluaran');

        $ppsdi_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PPSDI')
                    ->where('program', '=', 'Rutin')
                    ->sum('penerimaan');
        $ppsdi_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PPSDI')
                    ->where('program', '=', 'Rutin')
                    ->sum('pengeluaran');
        $ppsdi_non_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PPSDI')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('penerimaan');
        $ppsdi_non_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PPSDI')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('pengeluaran');
        $ppsdi_proyek_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PPSDI')
                    ->where('program', '=', 'Proyek')
                    ->sum('penerimaan');
        $ppsdi_proyek_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PPSDI')
                    ->where('program', '=', 'Proyek')
                    ->sum('pengeluaran');

        $peg_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PEG')
                    ->where('program', '=', 'Rutin')
                    ->sum('penerimaan');
        $peg_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PEG')
                    ->where('program', '=', 'Rutin')
                    ->sum('pengeluaran');
        $peg_non_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PEG')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('penerimaan');
        $peg_non_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PEG')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('pengeluaran');
        $peg_proyek_penerimaan = PkaDoc::where('sheet_komisi', '=', 'PEG')
                    ->where('program', '=', 'Proyek')
                    ->sum('penerimaan');
        $peg_proyek_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'PEG')
                    ->where('program', '=', 'Proyek')
                    ->sum('pengeluaran');

        $il_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'IL')
                    ->where('program', '=', 'Rutin')
                    ->sum('penerimaan');
        $il_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'IL')
                    ->where('program', '=', 'Rutin')
                    ->sum('pengeluaran');
        $il_non_rutin_penerimaan = PkaDoc::where('sheet_komisi', '=', 'IL')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('penerimaan');
        $il_non_rutin_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'IL')
                    ->where('program', '=', 'Non Rutin')
                    ->sum('pengeluaran');
        $il_proyek_penerimaan = PkaDoc::where('sheet_komisi', '=', 'IL')
                    ->where('program', '=', 'Proyek')
                    ->sum('penerimaan');
        $il_proyek_pengeluaran = PkaDoc::where('sheet_komisi', '=', 'IL')
                    ->where('program', '=', 'Proyek')
                    ->sum('pengeluaran');

        return view('pka_doc.dashboard', [
            'tpg_rutin_penerimaan'          => $tpg_rutin_penerimaan,
            'tpg_rutin_pengeluaran'         => $tpg_rutin_pengeluaran,
            'tpg_non_rutin_penerimaan'      => $tpg_non_rutin_penerimaan,
            'tpg_non_rutin_pengeluaran'     => $tpg_non_rutin_pengeluaran,
            'tpg_proyek_penerimaan'         => $tpg_proyek_penerimaan,
            'tpg_proyek_pengeluaran'        => $tpg_proyek_pengeluaran,
            'pelkes_rutin_penerimaan'          => $pelkes_rutin_penerimaan,
            'pelkes_rutin_pengeluaran'         => $pelkes_rutin_pengeluaran,
            'pelkes_non_rutin_penerimaan'      => $pelkes_non_rutin_penerimaan,
            'pelkes_non_rutin_pengeluaran'     => $pelkes_non_rutin_pengeluaran,
            'pelkes_proyek_penerimaan'         => $pelkes_proyek_penerimaan,
            'pelkes_proyek_pengeluaran'        => $pelkes_proyek_pengeluaran,
            'germasa_rutin_penerimaan'          => $germasa_rutin_penerimaan,
            'germasa_rutin_pengeluaran'         => $germasa_rutin_pengeluaran,
            'germasa_non_rutin_penerimaan'      => $germasa_non_rutin_penerimaan,
            'germasa_non_rutin_pengeluaran'     => $germasa_non_rutin_pengeluaran,
            'germasa_proyek_penerimaan'         => $germasa_proyek_penerimaan,
            'germasa_proyek_pengeluaran'        => $germasa_proyek_pengeluaran,
            'ppsdi_rutin_penerimaan'          => $ppsdi_rutin_penerimaan,
            'ppsdi_rutin_pengeluaran'         => $ppsdi_rutin_pengeluaran,
            'ppsdi_non_rutin_penerimaan'      => $ppsdi_non_rutin_penerimaan,
            'ppsdi_non_rutin_pengeluaran'     => $ppsdi_non_rutin_pengeluaran,
            'ppsdi_proyek_penerimaan'         => $ppsdi_proyek_penerimaan,
            'ppsdi_proyek_pengeluaran'        => $ppsdi_proyek_pengeluaran,
            'peg_rutin_penerimaan'          => $peg_rutin_penerimaan,
            'peg_rutin_pengeluaran'         => $peg_rutin_pengeluaran,
            'peg_non_rutin_penerimaan'      => $peg_non_rutin_penerimaan,
            'peg_non_rutin_pengeluaran'     => $peg_non_rutin_pengeluaran,
            'peg_proyek_penerimaan'         => $peg_proyek_penerimaan,
            'peg_proyek_pengeluaran'        => $peg_proyek_pengeluaran,
            'il_rutin_penerimaan'          => $il_rutin_penerimaan,
            'il_rutin_pengeluaran'         => $il_rutin_pengeluaran,
            'il_non_rutin_penerimaan'      => $il_non_rutin_penerimaan,
            'il_non_rutin_pengeluaran'     => $il_non_rutin_pengeluaran,
            'il_proyek_penerimaan'         => $il_proyek_penerimaan,
            'il_proyek_pengeluaran'        => $il_proyek_pengeluaran,
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

    public function download()
    {
        $nama_file = '2024_skkl_rencana_pka.xlsx';
        $file = storage_path() . "/app/public/2024_skkl_rencana_pka.xlsx";

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
        ];

        return response()->download($file, $nama_file, $headers);
    }
}
