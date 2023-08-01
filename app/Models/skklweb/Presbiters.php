<?php

namespace App\Models\skklweb;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presbiters extends Model
{
    use HasFactory;

    protected $fillable = [
        'jemat_id',
        'filename',
        'link_fb',
        'link_ig',
        'link_tiktok',
        'periode',
        'status',
        'status_phm',
        'keterangan',
    ];

    public function scopeActiveDiaken($query)
    {
        return $query->where('status', 'Diaken'); 
    }

    public function scopeActiveMajelis($query)
    {
        return $query->where('status', 'Majelis'); 
    }

    public function scopeActiveTheologi($query)
    {
        return $query->where('status', 'Theologi'); 
    }

    public function scopeActiveGermasa($query)
    {
        return $query->where('status', 'Germasa'); 
    }

    public function scopeActivePPSDI($query)
    {
        return $query->where('status', 'PPSDI'); 
    }

    public function scopeActivePEG($query)
    {
        return $query->where('status', 'PEG'); 
    }

    public function scopeActiveIL($query)
    {
        return $query->where('status', 'IL'); 
    }

    public function jemat()
    {
        return $this->belongsTo(Jemat::class, 'jemat_id', 'id')->withDefault();
    }
}
