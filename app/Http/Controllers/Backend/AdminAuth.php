<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    public function login() {

        return view('backend.login');
    }

    public function dologin() {

        $rememberme = request('rememberme') === 1;

        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        toast('بيانات الاعتماد غير صحيحة','error','top-right')->hideCloseButton();
        return back();
    }

    public function logout() {
        auth()->guard('admin')->logout();
        return redirect(url('dashboard/login'));
    }
}
