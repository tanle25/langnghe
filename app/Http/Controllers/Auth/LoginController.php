<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Admin\CartDb;
use Cart;

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
    protected $redirectTo = '/home';

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
        if(auth()->attempt(['email' => $request->username, 'password' => $request->password]) || auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            $carts = Cart::content();
            $user = auth()->user();
            foreach($carts as $cart)
            {
                $product_id = $cart->id;
                $amount = $cart->quantity;
                $tmp = CartDb::where('payment_id', null)->where('product_id', $product_id)->where('user_id', $user->id)->first();
                if($tmp != null){
                    $tmp->amount = $tmp->amount + $amount;
                    $tmp->update();
                }else{
                    CartDb::create([
                    'product_id'=> $product_id,
                    'user_id' => $user->id,
                    'amount' => $amount,
                    ]);
                }
            }
            return redirect()->route('home');
        }
        return back()->withErrors(['username' => 'Email or password are wrong.']);

    }
}
