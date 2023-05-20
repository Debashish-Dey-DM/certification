<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // $admin = Admin::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'password' => Hash::make($validatedData['password']),
        // ]);
        // $admin = new Admin;
        // $admin->name = $request->input('name');
        // $admin->email = $request->input('email');
        // // $admin->password = Hash::make($request->input('password'));
        // $admin->password = $request->input('password');
        // $admin->save();
        return response()->json([
            'message' => 'Admin created successfully ',
             'test'=> $request->input('name'),
            // 'admin' => $admin
        ], 201);
    }
//     public function store2(Request $request)
// {
//     $user = new User;

//     $user->name = $request->input('name');
//     $user->email = $request->input('email');
//     $user->password = Hash::make($request->input('password'));

//     $user->save();

//     return response()->json(['message' => 'User created', 'user' => $user], 201);
// }

}
