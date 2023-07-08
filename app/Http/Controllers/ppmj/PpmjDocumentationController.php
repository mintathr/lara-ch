<?php

namespace App\Http\Controllers\ppmj;

use App\Models\ppmj\PpmjDoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PpmjDocumentationController extends Controller
{
    public function index()
    {
        $ppmj       = PpmjDoc::get();
        $rowCount   = count($ppmj)-1;
        
        for($i=0;$i<=$rowCount;$i++){
            $loop[] = [
                'id'          => $ppmj[$i]->id,
                'pasal'       => $ppmj[$i]->pasal,
                'keterangan'  => $ppmj[$i]->keterangan,
            ];
        }
        array_unshift($loop,"");
        unset($loop[0]);
        #dd($rowCount,$loop);
            return view('ppmj_documentation.index', [
            'loop'              => $loop,
            /* 'pasal_1'           => $ppmj[0]['pasal'],
            'id_1'              => $ppmj[0],
            'keterangan_1_1'      => $ppmj[0]['keterangan'],
            'keterangan_1_2'      => $ppmj[1]['keterangan'],
            'keterangan_1_3'      => $ppmj[2]['keterangan'],
            'keterangan_2_1'      => $ppmj[3]['keterangan'],
            'keterangan_2_2_a'      => $ppmj[4]['keterangan'],
            'keterangan_2_2_b'      => $ppmj[5]['keterangan'],
            'keterangan_2_2_c'      => $ppmj[6]['keterangan'],
            'keterangan_2_2_d'      => $ppmj[7]['keterangan'],
            'keterangan_2_3'      => $ppmj[8]['keterangan'],
            'keterangan_3_1_a'      => $ppmj[9]['keterangan'],
            'keterangan_3_1_b_1'      => $ppmj[10]['keterangan'],
            'keterangan_3_1_b_2'      => $ppmj[11]['keterangan'],
            'keterangan_3_1_b_3'      => $ppmj[12]['keterangan'],
            'keterangan_3_1_b_4'      => $ppmj[13]['keterangan'],
            'keterangan_3_1_b_5'      => $ppmj[14]['keterangan'],
            'keterangan_3_1_b_6'      => $ppmj[15]['keterangan'],
            'keterangan_3_2'      => $ppmj[16]['keterangan'],
            'keterangan_3_3_a'      => $ppmj[17]['keterangan'],
            'keterangan_3_3_a_1'      => $ppmj[18]['keterangan'],
            'keterangan_3_3_a_2'      => $ppmj[19]['keterangan'],
            'keterangan_3_3_a_3'      => $ppmj[20]['keterangan'],
            'keterangan_3_3_a_4'      => $ppmj[21]['keterangan'],
            'keterangan_3_3_b_1'      => $ppmj[22]['keterangan'],
            'keterangan_3_3_b_2'      => $ppmj[23]['keterangan'], */
        ]);
    }

    public function edit($id)
    {
        dd($id);
    }
}
