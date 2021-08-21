<?php

namespace App\Virtual\Controllers;

class AuthController {
    /**
     * @OA\Post(
     *      path="/auth/login",
     *      tags={"authentication"},
     *      summary="Sign in",
     *      description="Login by email and pasword",
     *      @OA\RequestBody(ref="#/components/requestBodies/auth_request_body"),
     *      @OA\Response(
     *          response=200,
     *          description="Success response",
     *          @OA\JsonContent(ref="#/components/schemas/success_login")
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function login() {}

    /**
     * @OA\Post(
     *      path="/auth/register",
     *      tags={"authentication"},
     *      summary="Register",
     *      description="Register new user",
     *      @OA\RequestBody(ref="#/components/requestBodies/auth_request_body"),
     *      @OA\Response(
     *          response=201,
     *          description="Register succeed",
     *          @OA\JsonContent(ref="#/components/schemas/success_register")
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function register() {}

    /**
     * @OA\Post(
     *      path="/auth/me",
     *      tags={"authentication"},
     *      summary="Check login",
     *      description="Check current user auth",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="Register succeed",
     *          @OA\JsonContent(ref="#/components/schemas/success_me")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function me() {}

    /**
     * @OA\Post(
     *      path="/auth/logout",
     *      tags={"authentication"},
     *      summary="Logout",
     *      description="Logout user and revoke token",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="Logout succeed",
     *          @OA\JsonContent(ref="#/components/schemas/success_logout")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function logout() {}
}
