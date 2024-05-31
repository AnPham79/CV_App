<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $mailCheck = User::where('email', $request->email)->first();

        if($mailCheck)
        {
            session()->flash('error', 'Your email already exists');
            return redirect()->back();
        }

        $create = new User();
        $create->fill($request->except('_token'));
        $create->password = Hash::make($request->password);
        $create->save();

        return redirect()->route('auth.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // biến remember sẽ là true nếu như người dùng chọn remember
        $remember = $request->filled('remember');

        // hàm Auth::attempt sẽ thử đăng nhập với thông tin của credentials 
        // và sử dụng biến remember để quyết định xem có lưu phiên đăng nhập dài lâu k
        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();

        // vô hiệu hóa phiên làm việc hiện tại
        request()->session()->invalidate();

        // tái tạo lại csrf
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
