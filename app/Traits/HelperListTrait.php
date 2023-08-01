<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait HelperListTrait
{
    public function listKategori()
    {
        /* $pendidikan = [
            ['kode' => 1, 'sch' => 'SD'],
            ['kode' => 2, 'sch' => 'SMP'],
            ['kode' => 3, 'sch' => 'SMA'],
            ['kode' => 4, 'sch' => 'SMEA'],
            ['kode' => 5, 'sch' => 'STM'],
            ['kode' => 6, 'sch' => 'D1'],
            ['kode' => 7, 'sch' => 'D2'],
            ['kode' => 8, 'sch' => 'D3'],
            ['kode' => 9, 'sch' => 'D4'],
            ['kode' => 10, 'sch' => 'S1'],
            ['kode' => 11, 'sch' => 'S2'],
            ['kode' => 12, 'sch' => 'S3'],
        ]; */
        
        $pendidikan = [
            'SD',
            'SMP',
            'SMA',
            'SMEA',
            'STM', 
            'D1', 
            'D2', 
            'D3', 
            'D4', 
            'S1', 
            'S2',
            'S3'
        ];

        $gol_dar = [
            'O', 
            'A',
            'B',
            'AB'
        ];
        
        $hubKel = [
            ['dow' => 'KK', 'desc' => 'Kepala Keluarga'],
            ['dow' => 'IS', 'desc' => 'Istri'],
            ['dow' => 'AN', 'desc' => 'Anak'],
            ['dow' => 'OT', 'desc' => 'Orang Tua'],
            ['dow' => 'CU', 'desc' => 'Cucu'],
            ['dow' => 'KA', 'desc' => 'Kakak/ Adik Kandung'],
            ['dow' => 'MN', 'desc' => 'Menantu'],
            ['dow' => 'FA', 'desc' => 'Family Lain'],
        ];

        $statusAktif = [
            'Aktif',
            'Tidak Aktif',
            'Pindah',
            'Meninggal'
        ];

        $pelayanPt = [
            ['nik_pelayan'  => '08.01-02-0119-01', 'nama_pelayan'   => 'Kak Aldo'],
            ['nik_pelayan'  => '08.01-01-0001-02', 'nama_pelayan'   => 'Kak Heidi'],
            ['nik_pelayan'  => '08.01-02-0084-02', 'nama_pelayan'   => 'Kak Janis'],
            ['nik_pelayan'  => '08.01-01-0052-32', 'nama_pelayan'   => 'Kak Maria'],
            ['nik_pelayan'  => '08.01-01-0044-02', 'nama_pelayan'   => 'Kak Rini'],
            ['nik_pelayan'  => '08.01-01-0034-31', 'nama_pelayan'   => 'Kak Taro'],
            ['nik_pelayan'  => '08.01-01-0026-02', 'nama_pelayan'   => 'Kak Uli'],
            ['nik_pelayan'  => '08.01-01-0035-31', 'nama_pelayan'   => 'Kak Putri'],
        ];

        $pengurusPt = [
            ['nik_pengurus'  => '08.01-02-0119-01', 'nama_pengurus'   => 'Kak Aldo'],
            ['nik_pengurus'  => '08.01-02-0110-32', 'nama_pengurus'   => 'Kak Cokhie'],
            ['nik_pengurus'  => '08.01-02-0133-01', 'nama_pengurus'   => 'Kak Angga'],

        ];

        return [
            'pendidikan'    => $pendidikan,
            'gol_dar'       => $gol_dar,
            'hubKel'        => $hubKel,
            'statusAktif'   => $statusAktif,
            'pelayanPt'     => $pelayanPt,
            'pengurusPt'     => $pengurusPt
        ];
    }
}