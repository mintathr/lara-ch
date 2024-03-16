<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();
        if(!empty($inputVal['helper'])){
            $a = '08.01-';//01-0001-01
            $b = $a.$inputVal['email'];
            $passw = 'semangat';
        }else{
            $b = $inputVal['email'];
            $passw = $inputVal['password'];
        }

        $this->validate($request, [
            'email' => 'required',
            #'password' => 'required|min:8',
        ]);

        if (auth()->attempt(array('email' => $b, 'password' => $passw))) {
            $cek_tgl_ubah = User::where([
                ['email', '=', $b]
            ])->first();

            $last_change = Carbon::parse($cek_tgl_ubah->last_change);
            #$tgl_ubah = $last_change->addDays(90);

            //hitung selisih tgl sekarang dengan tgl terakhir ubah
            $selisih_hari = $last_change->diffInDays(now());

            if (auth()->user()->block >= 3) {
                Auth::logout();
                return redirect()->route('login')
                    ->with('error', 'Email Terblokir!.');
            } elseif (auth()->user()->is_admin == 1 and auth()->user()->block <= 2) {
                User::where('email', $b)->update([
                    'block' => 0,
                ]);

                if ($passw == "P@ssw0rd") {
                    return redirect()->route('changePasswordExp');
                }

                /* if ($selisih_hari <= 90) { */
                    Alert::toast('Login Berhasil', 'success')->width('25rem')->padding('5px');
                    return redirect()->route('admin.route');
                /* } else {
                    return redirect()->route('changePasswordExp');
                } */
            } elseif (auth()->user()->is_admin == 0 and auth()->user()->block <= 2) {
                User::where('email', $b)->update([
                    'block' => 0,
                ]);
                if ($passw == "P@ssw0rd") {
                    return redirect()->route('changePasswordExp');
                }

                if ($selisih_hari <= 90) {
                    Alert::toast('Login Berhasil', 'success')->width('25rem')->padding('5px');
                    return redirect()->route('viewProfile')->withErrors('success', 'your message,here');
                } else {
                    return redirect()->route('changePasswordExp');
                }
            } elseif (auth()->user()->is_admin == 2 and auth()->user()->block <= 2) {
                User::where('email', $b)->update([
                    'block' => 0,
                ]);
                /* if ($passw == "P@ssw0rd") {
                    return redirect()->route('changePasswordExp');
                } */

                #if ($selisih_hari <= 90) {
                    Alert::toast('Login Berhasil', 'success')->width('25rem')->padding('5px');
                    return redirect()->route('jemat.route');
                /* } else {
                    return redirect()->route('changePasswordExp');
                } */
            } elseif (auth()->user()->is_admin == 4 and auth()->user()->block <= 2) {
                User::where('email', $b)->update([
                    'block' => 0,
                ]);
                if ($passw == "P@ssw0rd") {
                    return redirect()->route('changePasswordExp');
                }

                if ($selisih_hari <= 90) {
                    Alert::toast('Login Berhasil', 'success')->width('25rem')->padding('5px');
                    return redirect()->route('pt.route');
                } else {
                    return redirect()->route('changePasswordExp');
                }
            }
        } else {
            if(!empty($request->helper)){

                if($cek_block = User::where([
                    ['email', '=', $b]
                ])->first()){
                    $awal_block = $cek_block['block'];

                    if ($awal_block >= 3) {
                        Auth::logout();
                        return redirect()->route('login')
                            ->with('error', 'Email Terblokir!.');
                    }

                    User::where('email', $b)
                        ->update(['block' => $awal_block + 1]);
                }
                return redirect()->route('loginUser')
                    ->with('error', 'Email & Password Salah!.');
            }else{
                return redirect()->route('login')
                    ->with('error', 'Email & Password Salah!.');
            }
        }
    }
}
