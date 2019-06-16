<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:35:07
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 11:44:21
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdminUser;

use Auth;

class AuthController extends Controller
{
	public function __construct()
    {
        
    }

    public function login()
    {
    	return view('admin.auth.login');
    }
    public function loginAction(Request $request)
    {
    	$this->validate($request, [	        
	        'email' => 'required|email|max:255',	        
	        'password' => 'required'
	    ]);
    	if (Auth::guard('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'status' => true], $request->get('remember'))) {
            // Authentication passed...
            $user_id = Auth::guard('admin')->user()->id;
            $AdminUser = AdminUser::find($user_id);
            $AdminUser->last_login_ip = $AdminUser->login_ip;
            $AdminUser->login_ip = $request->ip();
            $AdminUser->last_login_date = $AdminUser->login_date;
            $AdminUser->login_date = date('Y-m-d H:i:s');
            $AdminUser->save();
            return redirect()->intended('admin/');
        }
        else{
            return redirect()->back()->with('error_message', 'Email or Password mismatch, Please try again.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('admin/login');
    }

    
}