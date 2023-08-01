<?php

namespace App\Models\skklweb;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkUtube extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_utube',
        'tanggal',
        'subject',
        'keterangan',
    ];
}
