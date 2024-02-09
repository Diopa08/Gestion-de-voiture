<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255|required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $users = new User();
        $users->name = $request->input("name");
        $users->email = $request->input("email");
        $users->password = Hash::make($request->input("password"));

        $users->save();
         
        return redirect()->route('login')->with('success', 'Inscription réussie. Vous êtes maintenant connecté.');
    }
    public function showLoginForm()
    {
        return view('auth.login'); // Assurez-vous d'avoir une vue auth.login créée dans resources/views/auth/login.blade.php
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // Assurez-vous d'avoir une vue auth.login créée dans resources/views/auth/login.blade.php
    }

    public function showLinkRequestForm()
    {
        return view('auth.forgotPassword'); // Assurez-vous d'avoir une vue auth.login créée dans resources/views/auth/login.blade.php
    }

    public function showResetForm()
    {
        return view('auth.resetPassword'); // Assurez-vous d'avoir une vue auth.login créée dans resources/views/auth/login.blade.php
    }

    protected function connect(Request $request, $user)
{
    dd($user);
    auth()->login($user, $request->password);

    return redirect($this->redirectPath());
}

}
