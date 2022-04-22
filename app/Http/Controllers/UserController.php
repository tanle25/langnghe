<?php

namespace App\Http\Controllers;

use App\Admin\Huyen;
use App\Admin\Otp;
use App\Admin\Xa;
use App\Http\Requests\UserRequest as UserRequest;
use App\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    //
    public function register()
    {
        return view('front-end.register.step-1');
    }

    public function registerShop()
    {
        $xas = Xa::orderby('name')->get();
        return view('front-end.account.dang-ky-gian-hang', ['xas' => $xas]);
    }

    public function login()
    {
        if (!auth()->check()) {
            return view('front-end.login');
        } else {
            return redirect()->route('home');
        }

    }
    public function logout()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        } else {
            auth()->logout();
            return redirect()->route('home');
        }

    }

    public function step1(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user !== null) {
            Session::flash('error-user-register', 'Email đã được sử dụng !');
            return redirect()->route('register');

        }
        $data = [];
        $data['otp'] = str_random(5);
        $data['email'] = $email;
        $data['status'] = 0;
        $title = '[LÀNG NGHỀ THANH HÓA] Xác minh địa chỉ email !';
        $subject = '[LÀNG NGHỀ THANH HÓA] Xác minh địa chỉ email !';
        $content = 'Xin chào!<br>' .
            'Bạn nhận được email này bởi vì bạn đang đăng ký tài khoản tại https://langnghethanhhoa.vn<br>' .
            'Chúng tôi cần xác minh email đăng ký của bạn.<br>' .
            'Mã xác minh email của bạn là: ' . $data['otp'] . '<br>Trân trọng';
        send_mail($email, $title, $subject, $content);
        Session::flash('success-user-register', 'Mã xác minh đã được gửi tới số điện thoại <b>' . $email . '</b>.<br>
                                                        Bạn vui lòng kiểm tra tin nhắn để lấy mã xác minh!');
        $otp = Otp::create($data);
        return view('front-end.register.step-2', ['otp' => $otp->id, 'email' => $email]);
    }

    public function step2(Request $request)
    {
        $pwd = $request->password;
        $re_pwd = $request->password_confirmation;
        if ($pwd != $re_pwd) {
            Session::flash('error-user-register', 'Mật khẩu và mật khẩu nhập lại không trùng nhau !');
            return redirect()->back();
        }
        $verify_code = $request->verify_code;
        $otp_id = $request->otp_id;
        $otp = Otp::where('status', 0)->where('id', $otp_id)->first();
        if ($otp == null || $otp->email != $request->email) {
            Session::flash('error-user-register', 'Mã xác nhập không đúng. Vui lòng kiểm tra lại !');
            return redirect()->back();
        }
        $data = $request->all();
        $data['status'] = 0;
        $data['point'] = 0;
        $data['provider'] = 'web';
        $data['provider_id'] = 'web';
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return redirect()->route('home');
    }

    public function updateProfile(UserRequest $request)
    {
        $account = auth()->user();
        if ($account == null) {
            Session::flash('error-update', 'Không tìm thấy dữ liệu.');
            return redirect()->route('profile.get');
        }
        $account->update($request->all());
        Session::flash('success-update', 'Thay đổi thông tin thành công.');
        return redirect()->back();
    }

    public function getProfile()
    {
        $user = auth()->user();
        $huyens = Huyen::all();
        $huyen = $user->huyens;
        if ($huyen != null) {
            $data = $huyen->xas()->get();
        } else {
            $data = null;
        }

        return view('front-end.account.thong-tin-ca-nhan', ['user' => $user, 'data' => $data, 'flag' => 'acc', 'huyens' => $huyens]);
    }

    public function updateAvatar(Request $request)
    {
        $file = $request->avatar;
        $a = getimagesize($file);
        $image_type = $a[2];
        if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
            $name_file = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('avatars', $name_file);
            $account = User::find(auth()->user()->id);
            $account->update(['image' => $name_file]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function updatePwd(Request $request)
    {
        $account = auth()->user();
        $old_pwd = $request->password;
        $new_pwd = $request->new_password;
        $re_new_pwd = $request->re_new_password;
        if (!(\Hash::check($old_pwd, \Auth::user()->password))) {
            Session::flash('error-user-pwd', 'Mật khẩu cũ không đúng.');
            return redirect()->back();
        }
        if (strlen($new_pwd) < 6) {
            Session::flash('error-user-pwd', 'Mật khẩu mới ít nhất 6 ký tự.');
            return redirect()->back();
        }

        if ($new_pwd != $re_new_pwd) {
            Session::flash('error-user-pwd', 'Mật khẩu nhập lại không trùng nhau.');
            return redirect()->back();
        }
        $account = User::find(auth()->user()->id);
        $account->update(['password' => bcrypt($new_pwd)]);
        Session::flash('success-user-pwd', 'Đổi mật khẩu thành công.');
        return redirect()->back();
    }

    public function xaAjax(Request $request)
    {
        $huyen_id = $request->input('huyen');
        $user = auth()->user();
        $res = [];
        $huyen = Huyen::find($huyen_id);
        if ($huyen != null) {
            $res = $huyen->xas()->get();
        }

        return view('front-end.account.xa', ['data' => $res, 'user' => $user]);
    }

    public function donhang()
    {
        $user = auth()->user();
        $donhangs = $user->donhangs()->get();
        return view('front-end.account.checkout', ['user' => $user, 'donhangs' => $donhangs, 'flag' => 'donhang']);
    }
}