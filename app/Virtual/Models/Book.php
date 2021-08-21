<?php

/**
 * @OA\Schema(
 *     title="Book",
 *     description="Book model",
 *     @OA\Xml(
 *         name="Book"
 *     )
 * )
 */

class Book {
    /**
     * @OA\Property(
     *      title="ID",
     *      description="ID Book",
     *      example="abcdef0123456789",
     *      type="string"
     * )
     *
     * @var string
     */
    private $_id;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Book title",
     *      example="Lorem ipsum",
     *      type="string"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Book description",
     *      example="Lorem ipsum",
     *      type="string"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Author",
     *      description="Book author",
     *      example="Lorem ipsum",
     *      type="string"
     * )
     *
     * @var string
     */
    public $author;

    /**
     * @OA\Property(
     *      title="Published year",
     *      description="Book published year",
     *      example="2021",
     *      type="string"
     * )
     *
     * @var string
     */
    public $published_year;

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
