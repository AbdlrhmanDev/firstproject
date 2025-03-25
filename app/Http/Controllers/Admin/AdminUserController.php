<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// class AdminUserController extends Controller
// {
//     public function showRegisterForm()
//     {
//         return view('admin.register');
//     }

//     public function register(Request $request)
//     {
    
//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6|confirmed',
//             'role' => 'required|in:admin,employer,user',
//         ]);

//         User::create([
//             'name' => $validated['name'],
//             'email' => $validated['email'],
//             'password' => Hash::make($validated['password']),
//             'role' => $validated['role'],
//         ]);


//         return redirect()->route('admin.register')->with('success', 'User Registered Successfully');
//     }
// }





    // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed',
        //     'role' => 'required|in:admin,employer,user',
        // ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role,
        // ]);