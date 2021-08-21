<?php

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */

class User {
    /**
     * @OA\Property(
     *      title="ID",
     *      description="ID User",
     *      example="abcdef0123456789",
     *      type="string"
     * )
     *
     * @var string
     */
    private $_id;

    /**
     * @OA\Property(
     *      title="Email",
     *      description="Email User",
     *      format="email",
     *      example="user@mail.com",
     *      type="string"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
