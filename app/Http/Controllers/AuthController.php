<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function customerLoginAuth(Request $request) {

    }
}
