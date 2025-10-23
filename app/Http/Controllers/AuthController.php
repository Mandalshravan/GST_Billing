<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;
use Mail;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function login(Request $request){
        $data['meta_title'] = "Login Page";
        return view('auth.login', $data);
    }

    public function loginPost(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            if(Auth::User()->is_role == '1')
            {
                return redirect()->intended('admin/dashboard');
            }
            else{
                return redirect('/')->with('error','Admin Not Available');
            }
        }
        else{
            return redirect()->back()->with('error','Please enter the correct Credentials');
        }

    }


    public function register(Request $request){
        $data['meta_title'] = "Register Page";
        return view('auth.register', $data);
    }

    public function registerPost(Request $request){
        // dd($request->all());

        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Registration successful. Please login.');
    }


    public function forgotPassword(Request $request){
        $data['meta_title'] = "Forgot Password";
        return view('auth.forgot-password', $data);
    }

public function forgotPasswordPost(Request $request)
{
    // Validate email input
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $user = User::where('email', $request->email)->first();
    $random_pass = rand(100000, 999999);

    // Update the user's password and send the reset email
    $user->password = Hash::make($random_pass);
    $user->save();

    // Send email with the new password
    Mail::to($user->email)->send(new ForgotPasswordMail($user, $random_pass));

    return redirect()->back()->with('success', 'Password has been sent to your email.');
}



    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
