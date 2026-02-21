<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Wrong Information'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'user' => $user,
            'token' => $token,
        ]);
    }
}
