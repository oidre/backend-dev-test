<?php

/**
 * @OA\Schema(
 *      schema="success_login",
 *      description="Success Login",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="Login succeed"
 *      ),
 *      @OA\Property(
 *          property="data",
 *          type="object",
 *          @OA\Property(
 *              property="access_token",
 *              example="jwt token"
 *          ),
 *          @OA\Property(
 *              property="token_type",
 *              example="bearer"
 *          ),
 *          @OA\Property(
 *              property="expires_in",
 *              example="in miliseconds"
 *          ),
 *      )
 * )
 *
 * @OA\Schema(
 *      schema="success_register",
 *      description="Success Register",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="Register succeed"
 *      ),
 *      @OA\Property(property="data", ref="#/components/schemas/User")
 * )
 *
 * @OA\Schema(
 *      schema="success_me",
 *      description="User is authenticated",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="User is authenticated"
 *      ),
 *      @OA\Property(property="data", ref="#/components/schemas/User")
 * )
 *
 * @OA\Schema(
 *      schema="success_logout",
 *      description="Logout user and revoke token",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="Logout succeed"
 *      )
 * )
 */
