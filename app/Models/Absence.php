<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id',
        'phone_number',
        'kegiatan',
        'tgl_kegiatan',
        'latitude',
        'longitude'
    ];
}
