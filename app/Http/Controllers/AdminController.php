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
        return response()->json([
            'message' => 'Admin created successfully',
            'admin' => "admin"
        ], 201);
    }
}
