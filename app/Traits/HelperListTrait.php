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

        return [
            'pendidikan'    => $pendidikan,
            'gol_dar'       => $gol_dar,
            'hubKel'        => $hubKel
        ];
    }
}