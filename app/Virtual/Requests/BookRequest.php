<?php

/**
 * @OA\RequestBody(
 *      request="book_request_body",
 *      required=true,
 *      description="book_request",
 *      @OA\JsonContent(ref="#/components/schemas/BookRequest")
 * )
 */

/**
 * @OA\Schema(
 *      title="Book request",
 *      description="Book request body data",
 *      type="object",
 *      required={"title", "description", "author", "published_year"}
 * )
 */

class BookRequest {
    /**
     * @OA\Property(
     *      title="title",
     *      description="Book title",
     *      example="Lorem ipsum"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Book description",
     *      example="Lorem ipsum"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="author",
     *      description="Book author",
     *      example="Lorem ipsum"
     * )
     *
     * @var string
     */
    public $author;

    /**
     * @OA\Property(
     *      title="published year",
     *      description="Book published year",
     *      example="2021"
     * )
     *
     * @var string
     */
    public $published_year;
}
