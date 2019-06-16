<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:37:36
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-16 13:37:41
 */

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Mail\Common;
use App\Models\Profile;
use App\User;

use Auth;
use Hash;
use Mail;
use App\Http\Controllers\Controller;
use Socialite;
use Validator;

class AuthController extends Controller
{
	public function __construct()
    {

    }

    public function user_registration_rules(array $data)
    {
      $messages = [
        'email.required' => ' この項目は必須です',
        'email.unique' => 'メールアドレスはすでに存在します'
      ];

      $validator = Validator::make($data, [
            'email' => 'required|email|unique:users'
      ], $messages);

      return $validator;
    }

    public function registerRequest(Request $request)
    {
        return view('auth.register_request');
    }

    public function registerRequestAction(Request $request)
    {
        $validator = $this->user_registration_rules($request->toArray());
        if($validator->fails())
        {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $User = new User();
        $User->first_name = 'welcome user';
        $User->email = $request->email;
        $User->password = Hash::make(rand(100000,999999));
        $User->register_token = time().rand(1000,9999);
        $User->save();

        $emailData = [
            'name' => 'User',
            'register_token' => $User->register_token,
            'subject' => 'Registration Process',
            'from_email' => 'noreply@crofun.com',
            'from_name' => 'CROFUN',
            'template' => 'user.email.registration_process',
            'root'     => $request->root()
        ];

        Mail::to($request->email)
            ->send(new Common($emailData));

        return redirect()->back()->with('success_message', 'メールを送信しました。');

    }

    public function register(Request $request)
    {
        $token = $request->token;
        $data['user'] = User::where('register_token', $token)->first();
        if($data['user']){
            return view('auth.register', $data);
        }
        abort(404);

    }

    public function registerAction(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            // 'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        $User = User::where('register_token', $request->token)->first();
        $User->first_name = $request->first_name;
        $User->last_name = $request->last_name;
        $User->password = Hash::make($request->password);
        $User->is_email_verified = true;
        $User->status = true;
        $User->save();

        $Profile = new Profile();
        $Profile->user_id = $User->id;
        $Profile->save();

        return redirect()->to(route('login'))->with('success_message', 'registration successfull,you can now login to your account');

    }

    public function changePassword(Request $request)
    {
        return view('user.change_password');
    }

    public function changePasswordAction(Request $request)
    {
        // dd($request);
    	$this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed'
	    ]);

        $User = User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $User->password)) {
            $User->password = Hash::make($request->password);
            $User->save();
            return redirect()->back()->with('success_message', 'Password Changed Successfully');
        }
        return redirect()->back()->with('error_message', 'Current Password Does Not Match');


    }


    public function facebook(Request $request)
    {
			  $redirectUrl = $request->root().'/facebook-action';
				// $redirectUrl = 'https://crofun.jp/facebook-action';
        return Socialite::driver('facebook')->setScopes(['email'])->redirectUrl($redirectUrl)->redirect();
    }

    public function facebookAction(Request $request)
    {
        $redirectUrl = $request->root().'/facebook-action';
        $user = Socialite::driver('facebook')->redirectUrl($redirectUrl)->user();
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->facebook_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->facebook_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;


            // $this->updateProfile($User);

        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Facebook connected!');
        }

        Auth::loginUsingId($userId, true);
        return redirect()->intended(route('user-profile-update'));

    }


    public function google(Request $request)
    {
        $redirectUrl = $request->root().'/google-action';
        return Socialite::driver('google')->setScopes(['email'])->redirectUrl($redirectUrl)->redirect();
    }

    public function googleAction(Request $request)
    {
        $redirectUrl = $request->root().'/google-action';
        $user = Socialite::driver('google')->redirectUrl($redirectUrl)->user();
        // dd($user);
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->google_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->google_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;

            // $this->updateProfile($User);

        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Google connected!');
        }
        Auth::loginUsingId($userId, true);
        return redirect()->intended(route('user-profile-update'));

    }


    public function twitter(Request $request)
    {
        $redirectUrl = $request->root().'/twitter-action';
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterAction(Request $request)
    {
        $redirectUrl = $request->root().'/twitter-action';
        $user = Socialite::driver('twitter')->user();
        // dd($user);
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->twitter_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->google_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;

            // $this->updateProfile($User);

        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Twitter connected!');
        }

        Auth::loginUsingId($userId, true);
        return redirect()->intended(route('user-profile-update'));

    }


    public function yahoo(Request $request)
    {
        $redirectUrl = $request->root().'/yahoo-action';
        return Socialite::driver('yahoo')->redirect();
    }

    public function yahooAction(Request $request)
    {
        $redirectUrl = $request->root().'/yahoo-action';
        $user = Socialite::driver('yahoo')->user();
        // dd($user);
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->twitter_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->google_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;

            // $this->updateProfile($User);

        }

        Auth::loginUsingId($userId, true);
        return redirect()->intended(route('user-profile-update'));

    }



    public function logout()
    {
    	Auth::logout();
    	return redirect()->to(route('front-home'));
    }
}
