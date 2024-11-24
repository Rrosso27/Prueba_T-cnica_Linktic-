<?php

namespace App\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Auth\Http\Requests\LoginRequest;
use App\Auth\Http\Controllers\Controller;
use App\Auth\Http\Requests\StoreUsersRequest;

class AuthController extends Controller
{
    /**
     * Register a new user
     * @param StoreUsersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(StoreUsersRequest $request)
    {
        try {


            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(['token' => $token], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User already exists'], 400);
        }
    }
    /**
     * Get the authenticated user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        $credentials = $request->only('email', 'password');

    }

    public function getUser()
    {
        return response()->json(Auth::user());
    }
}
