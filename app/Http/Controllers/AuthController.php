<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView() {
        return view('Authentication.Register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|min:3|max:20',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'dob' => 'required|date',
            'confirm-password' => 'required|string'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'balance' => 0
        ]);

        return redirect(route('registerView'));
    }

    public function loginView() {
        return view('Authentication.Login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('loginView'));
    }

    public function forgotPasswordView() { 
        return view('Authentication.Forgot_Password');
    }

    public function forgotPassword(Request $request) {
        $users = User::all();
        foreach ($users as $user) {
            if($user->email == $request->email){
                return redirect(route('newPasswordView', ['id'=>$user->id]));
            }
        }
        return back()->withErrors([
            'email' => 'There is no email named '.$request->email
        ]);
    }

    // public function reenterCodeView() {
    //     $random = rand() % 100000;
    //     return view('Authentication.Reenter_Code')->with('rand', $random);
    // }

    // public function reenterCode($rand, Request $request) {
    //     if($request->randomNumber == $rand){
    //         return redirect(route('newPasswordView', ['id'=>1]));
    //     }
    //     return back();
    // }
    
    public function newPasswordView($id) {
        return view('Authentication.New_Password')->with('id', $id);
    }

    public function newPassword($id, Request $request) {
        $users = User::findOrFail($id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('loginView'));
    }
}
