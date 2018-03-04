<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user === null || ! password_verify($request->input('password'), $user->password)) {
            // User does not exist or password is incorrect
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        // User login successful
        return response()->json([
            'api_token' => $user->api_token,
        ]);
    }
}
