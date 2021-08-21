<?php

/**
 * @OA\RequestBody(
 *      request="auth_request_body",
 *      required=true,
 *      description="auth_request",
 *      @OA\JsonContent(ref="#/components/schemas/AuthRequest")
 * )
 */

/**
 * @OA\Schema(
 *      title="Auth request",
 *      description="Auth request body data",
 *      type="object",
 *      required={"email", "password"}
 * )
 */

class AuthRequest {
    /**
     * @OA\Property(
     *      title="email",
     *      description="User email",
     *      format="email",
     *      example="test@mail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="User password",
     *      format="password",
     *      example="12345678"
     * )
     *
     * @var string
     */
    public $password;
}
