<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255',

            'namalengkap' => 'required|max:255',
            'nomortelepon' => 'required',
            'pekerjaan' => 'required'
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registrasi Berhasil, Silahkan Login');

        return redirect('/login');
    }
}
