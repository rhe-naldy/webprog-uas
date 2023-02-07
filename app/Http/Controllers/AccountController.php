<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Models\Account;

class AccountController extends Controller
{
    public function checkAuth(){
        if(Auth::check()){
            return view('home');
        } else if(!Auth::check()){
            return view('index');
        }
    }

    public function viewRegisterPage(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'required|email|unique:accounts',
            'role' => 'required',
            'gender' => 'required',
            'display_picture_link' => 'required|file|mimes:jpeg,jpg,png,gif',
            'password' => 'required|min:8|alpha_num',
            'confirm_password' => 'required|same:password'
        ], [
            'first_name.required' => 'Please enter your first name',
            'first_name.alpha' => 'First name must only use alphabets',
            'first_name.max' => 'First name is too long',
            'last_name.required' => 'Please enter your last name',
            'last_name.alpha' => 'Last name must only use alphabets',
            'last_name.max' => 'Last name is too long',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter an email address',
            'email.unique' => 'The email is already registered',
            'role.required' => 'Please select your role',
            'gender.required' => 'Please select your gender',
            'display_picture_link.required' => 'Please upload your profile picture',
            'display_picture_link.file' => 'Profile picture needs to be a file',
            'display_picture_link.mimes' => 'Profile picture needs to be jpeg, jpg, png, or gif format',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password is too short',
            'password.alpha_num' => 'Password must be alphanumerical',
            'password_confirmation.required' => 'Please confirm your password',
            'password_confirmation.same' => 'The passwords are different'
        ]);

        //upload image

        Account::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'display_picture_link' => $imageName,
            'password' => $request->password
        ]);
    }

    public function viewLoginPage(Request $request){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if($request->remember){
            Cookie::queue('emailCookie', $request->email, 20);
            Cookie::queue('passwordCookie', $request->password, 20);
        }

        if(Auth::attempt($credentials, true)){
            Session::put('session', $credentials);
            return redirect('/home');
        }

        return redirect('/login')->withErrors(['credentials' => 'Incorrect email or password']);
    }

    public function logout(){
        Auth::logout();
        return view('logout');
    }

    public function viewMaintenancePage(){
        $accounts = Account::all();

        return view('maintenance')->with('accounts', $accounts);
    }

    public function viewUpdateRolePage($account_id){
        $currAccount = Account::find($account_id);

        return view('update-role')->with('account', $currAccount);
    }

    public function updateRole(Request $request, $account_id){
        $currAccount = Account::find($account_id);
        $currAccount->role_id = $request->role_id;
        $currAccount->save();

        return redirect()->back();
    }

    public function deleteAccount($account_id){
        $currAccount = Account::find($account_id);
        $currAccount->delete();

        return redirect()->back();
    }
}
