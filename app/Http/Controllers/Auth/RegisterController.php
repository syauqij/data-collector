<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request->name);
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:100',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->password,
            'email'=> $request->email,
            'password' => Hash::make($request->username)
        ]);

        return redirect()->route('dashboard');
    }
}