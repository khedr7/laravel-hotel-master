<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('auth');
            return [
                'message' => 'login was successful',
                'data'    => [
                    'token' => $token->plainTextToken,
                ]
            ];
        }

        return [
            'message' => 'email or password is wrong'
        ];
    }
}
