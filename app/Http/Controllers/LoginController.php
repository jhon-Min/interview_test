<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|min:5',
            'password' => 'required|max:7',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status'  => 404,
                'message' => 'Model not found.'
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'  => 404,
                'message' => 'Invalid credentials'
            ]);
        }

        return AuthResource::make($user);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|min:5',
            'password' => 'required|max:7',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return AuthResource::make($user);
    }
}
