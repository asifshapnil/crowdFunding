<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 11:43:51
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 13:27:11
 */


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\AdminUser;

use Auth;
use Hash;


use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public function __construct()
    {
        
    }

    public function changePassword()
    {
        $data['title'] = "Change Password";
        return view('admin.profile.change_password', $data);
    }

    public function changePasswordAction(Request $request)
    {
        $this->validate($request, [	        
	        'current_password' => 'required',	        
	        'password' => 'required|confirmed',
	        'password_confirmation' => 'required'
	    ]);

        $AdminUser = AdminUser::find(Auth::guard('admin')->user()->id);
	    if (Hash::check($request->current_password, $AdminUser->password)) {
            $AdminUser->password = Hash::make($request->password);
            if ($AdminUser->save()) {
                Auth::guard('admin')->logout();
                return redirect()->route('admin-login')->with('success_message', 'Password Successfully Updated. Please login with your new password.');
            }else{
            	return redirect()->back()->with('error_message', 'Something went wrong! Please try again.');
            }
        }

        return redirect()->back()->with('error_message', "Current Password Doesn't Match.");
    }
}