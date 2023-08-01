<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelkatAbsence extends Model
{
    use HasFactory;

    protected $fillable = [
        'jemat_id',
        'tgl_ibadah',
        'keterangan',
    ];

    public function jemat()
    {
        return $this->belongsTo(Jemat::class, 'jemat_id', 'id')->withDefault();
    }
    
}
