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
            return redirect('/home');
        } else if(!Auth::check()){
            return view('index');
        }
    }

    public function viewRegisterPage(){
        $genders = GenderController::getAllGenders();

        return view('register')->with('genders', $genders);
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

        $ext = $request->display_picture_link->getClientOriginalExtension();
        $first = explode(" ", $request->title)[0];
        $imageName = $first . "-" . time() . "." . $ext;
        $request->thumbnail->move('accounts/', $imageName);

        Account::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'display_picture_link' => "accounts/" . $imageName,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login');
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
        return redirect('/logout');
    }

    public function viewLogoutPage(){
        return view('logout');
    }

    public function viewProfilePage(){
        $account_id = Auth::user()->account_id;
        $account = Account::find($account_id);
        $genders = GenderController::getAllGenders();

        return view('profile')->with('account', $account)->with('genders', $genders);
    }

    public function updateProfile(Request $request){
        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'required|email|unique:accounts',
            'role' => 'required',
            'gender' => 'required',
            'display_picture_link' => 'file|mimes:jpeg,jpg,png,gif',
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
            'display_picture_link.file' => 'Profile picture needs to be a file',
            'display_picture_link.mimes' => 'Profile picture needs to be jpeg, jpg, png, or gif format',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password is too short',
            'password.alpha_num' => 'Password must be alphanumerical',
            'password_confirmation.required' => 'Please confirm your password',
            'password_confirmation.same' => 'The passwords are different'
        ]);

        $account_id = Auth::user()->account_id;
        $account = Account::find($account_id);
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->role_id = $request->role;
        $account->gender_id = $request->gender;
        $account->password = bcrypt($request->password);

        if($request->display_picture_link != null){
            $ext = $request->display_picture_link->getClientOriginalExtension();
            $first = explode(" ", $request->title)[0];
            $imageName = $first . "-" . time() . "." . $ext;
            $request->thumbnail->move('accounts/', $imageName);

            $account->display_picture_link = "accounts/" . $imageName;
        }

        $account->save();

        return redirect()->back();
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
