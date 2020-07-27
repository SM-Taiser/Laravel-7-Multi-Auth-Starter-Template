<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('backend.admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        
        $errors = ['email' => trans('auth.failed')];
        return back()->withInput($request->only('email', 'remember'))->withErrors($errors);;
    }

    public function adminLogOut(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->intended('/admin/login');
    }
}
