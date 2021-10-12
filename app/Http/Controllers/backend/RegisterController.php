<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';
        return view('login.register',  compact('title'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'      => 'required|max:255',
            'username'  => 'required|unique:users|max:255',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:5|max:255'
        ]); 

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        return redirect('login')->with('success', 'Registrasi berhasil ! Silahkan login');
    }
}
