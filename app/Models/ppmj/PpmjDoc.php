<?php

namespace App\Models\ppmj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpmjDoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'pasal',
        'keterangan'
    ];
}
