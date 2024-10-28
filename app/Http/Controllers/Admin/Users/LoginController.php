<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect()->route('admin'); // Chuyển hướng đến trang chính
        }

        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống',
        ]);
    }
    public function accessLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }

        $request->session()->flash('error', 'Email hoặc mật khẩu chưa chính xác! Vui lòng kiểm tra lại.');
        return redirect()->back();
    }
}
