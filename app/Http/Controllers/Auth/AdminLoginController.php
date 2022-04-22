<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/';
    protected $guard = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('back-end.admin.auth.login');
    }


    public function login(Request $request)
    {
        if(auth()->guard('admin')->attempt(['email' => $request->username, 'password' => $request->password, 'status' => 1]) || auth()->guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1])) {
        	return redirect()->intended($this->redirectPath());
        }
        return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng. Hoặc tài khoản chưa được duyệt !']);

    }

    public function logout(){
        if(!auth()->guard('admin')->check())
            return redirect()->route('admin.home');
        else{
            auth()->guard('admin')->logout();
            return redirect()->route('admin.home');
        }
    }
}
