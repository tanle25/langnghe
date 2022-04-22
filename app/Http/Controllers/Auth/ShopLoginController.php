<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ShopLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $guard = 'shop';
    protected $redirectTo = '/';

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
        return view('back-end.shop.auth.login');
    }


    public function login(Request $request)
    {
        if(auth()->guard('shop')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1]) || auth()->guard('shop')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1])) {
        	return redirect()->route('product.index');
        }
        return back()->withErrors(['username' => 'Tên đăng nhập hoặc mật khẩu sai.']);

    }
}
