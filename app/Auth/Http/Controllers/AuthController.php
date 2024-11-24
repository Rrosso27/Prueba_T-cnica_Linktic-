<?php
namespace App\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Auth\Http\Controllers\Controller;
use App\Auth\Http\Requests\StoreUsersRequest;

class AuthController extends Controller
{
    public function register(StoreUsersRequest $request)
    {
        $user = User::create($request->validated());
        $token = JWTAuth::fromUser($user);
        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        return response()->json(['token' => $token]);
    }
}
