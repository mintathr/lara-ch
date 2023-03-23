<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jemat extends Model
{
    use HasFactory;

    protected $fillable = [
            'kode_keluarga',
            'no_induk',
            'nama_pertama',
            'nama_belakang',
            'nama_lengkap',
            'nama_keluarga',
            'jenis_kelamin',
            'hubungan_keluarga',
            'tempat_lahir',
            'tgl_lahir',
            'tempat_baptis',
            'tgl_baptis',
            'tempat_sidi',
            'tgl_sidi',
            'tgl_nikah_gereja',
            'tgl_nikah_sipil',
            'golongan_darah',
            'pendidikan_terakhir',
            'status_pelkat',
            'sektor',
            'province_id',
            'regency_id',
            'district_id',
            'village_id',
            'alamat',
            'alamat_saat_ini',
            'keterangan',
    ];

    public function scopeActivePklu($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 60');
    }

    public function scopeActivePkbPkp($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 61')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 18')
            ->WhereNotNull('tgl_nikah_gereja');     
    }

    public function scopeActivePkbPkpNoMarriage($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 61')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 40')
            ->whereNull('tgl_nikah_gereja');     
    }

    public function scopeActiveGp($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 41')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 18')
            ->WhereNull('tgl_nikah_gereja');     
    }

    public function scopeActivePt($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 19')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 10')
            ->WhereNull('tgl_nikah_gereja');     
    }

    public function scopeActivePa($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 11')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) >= 0')
            ->WhereNull('tgl_nikah_gereja');     
    }
    
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->age; // calculate age
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id')->withDefault();
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id')->withDefault();
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id')->withDefault();
    }
}
