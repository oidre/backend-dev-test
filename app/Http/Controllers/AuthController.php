<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends ApiController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->middleware('auth', ['except' => ['register', 'login']]);
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $this->validate($request, $rules);

        $token = $this->authService->login($request->only(['email', 'password']));
        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255'
        ];
        $this->validate($request, $rules);

        $user = $this->authService->register($request->only(['email', 'password']));
        return $this->successResponse(
            $user,
            'Successful register new user',
            Response::HTTP_CREATED
        );
    }

    public function me()
    {
        return $this->authService->me();
    }

    public function logout()
    {
        $this->authService->logout();
        return $this->successResponse(null, 'Successful logged out');
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->successResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => app('auth')->factory()->getTTL() * 60,
        ], 'Successful logged in');
    }

}
