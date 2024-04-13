<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use SIAMUBAuth\SIAMAuth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function customerLoginView() {
        $pageTitle = 'Login';

        return view('auth/customer/login', compact('pageTitle'));
    }

    public function driverRegisterView() {
        $pageTitle = 'Driver Registration';

        return view('auth/driver/register', compact('pageTitle'));
    }

    public function driverLoginView() {
        $pageTitle = 'Driver Login';

        return view('auth/driver/login', compact('pageTitle'));
    }

    public function customerAuth(Request $request) {
        /*
            for development purposes, i'll comment the below code, shit took to long for some reason
        */

        // $client = new Client();
        // $user = SIAMAuth::authenticate($request['nim'], $request['password'], $client);

        // if (!isset($user)) {
        //     return redirect('/auth/customer/login')->with('fail', 'Invalid Credential');
        // }

        $mhs = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mhs) {
            // $mhs = new Mahasiswa();
            // $mhs->populate($user);
            // $mhs->save();
            return redirect('/auth/customer/login')->with('fail', 'Invalid Credential');
        }

        Auth::guard('mahasiswa')->login($mhs, true);

        $request->session()->regenerate();

        return redirect('/orders/my');

    }

    public function customerLogout(Request $request) {
        Auth::guard('mahasiswa')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function driverLogin(Request $request) {

    }

    public function driverRegister(Request $request) {

    }
}
