<?php

namespace App\Http\Controllers\Presence;

use Carbon\Carbon;
use App\Models\Absence;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AbsenceController extends Controller
{
    private $td;
    public function __construct()
    {
        $this->td = Carbon::now();
    }

    public function index()
    {
        return view('absence.index');
    }

    public function store(Request $request)
    {
        $messages = [
                        'phone_number.required'  => 'Nomor Handphone Harus Diisi!',
                        'phone_number.min'       => 'Minimal 10 angka!',
                        'phone_number.max'       => 'Maximal 13 angka!',
                        'phone_number.numeric'   => 'Format Harus angka!',
                    ];
            
        $request->validate([
            'phone_number'            => 'required|string|min:9|max:13',
        ], $messages);
        
        $phoneNumber = '62' . ltrim($request->phone_number, '0');
        $userLatitude   = $request->latitude;
        $userLongitude  = $request->longitude;
        
        //cek duplicate
        $cek = Absence::whereDate('tgl_kegiatan',$this->td)
                ->where('phone_number', $phoneNumber)->exists();
        if($cek){
            Alert::toast('Anda sudah pernah absen.', 'warning')->width('25rem')->padding('5px');
            return redirect()->route('presensi');
        }else{
                    
            $lokasi = Location::first(); // Ambil lokasi pertama sebagai contoh
            $distance = $this->calculateDistance($lokasi->latitude, $lokasi->longitude, $userLatitude, $userLongitude);

            if ($distance > $lokasi->radius) {
                Alert::toast('Anda berada di luar lokasi yang diizinkan.', 'error')->width('25rem')->padding('5px');
                return redirect()->route('presensi');
                #return response()->json(['message' => 'Anda berada di luar lokasi yang diizinkan.'], 403);
            }

            $res = Absence::create([
                'location_id'   => 1,
                'kegiatan'      => 'Pembinaan Pengurus & Pelayan PA PT',
                'tgl_kegiatan'  => $this->td->format('Y-m-d'),
                'phone_number'  => $phoneNumber,
                'latitude'      => $userLatitude,
                'longitude'     => $userLongitude,
            ]);

            Alert::toast('Anda berhasil masuk.', 'success')->width('25rem')->padding('5px');
            #return response()->json(['message' => 'Anda berhasil masuk.']);
            return redirect()->route('presensi');
            /* -6.1957844
106.7717920

blok G
-6.194018533257633
106.73608405617982 */
        }
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371000; // radius bumi dalam meter

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c; // Jarak dalam meter
    }
}
