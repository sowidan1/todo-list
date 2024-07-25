<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Requests\API\LoginRequest;
use App\services\ApiResponseFormat;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public $response;
    public function __construct()
    {
        $this->response = new ApiResponseFormat();
    }
    public function register(RegisterRequest $request)
    {

        $user = new User([
            'name' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'password' => bcrypt($request->validated()['password']),
        ]);

        if ($user->save()) {
            $token = $user->createToken('auth_token')->plainTextToken;

            $user_info = [
                'user' => $user,
                'access_token' => $token,
            ];

            return $this->response->success($user_info, 'User created successfully');
        } else {
            return $this->response->error('User could not be created', 500);
        }
    }

    public function login(LoginRequest $request)
    {

        if (!auth()->attempt($request->validated())) {
            return $this->response->error('Invalid credentials', 401);
        }

        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        $user_info = [
            'user' => $user,
            'access_token' => $token,
        ];

        return $this->response->success($user_info, 'User logged in successfully');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->response->success([], 'User logged out successfully');
    }
}
