<?php

namespace App\Virtual\Controllers;

class BookController {
    /**
     * @OA\Get(
     *      path="/books",
     *      tags={"books"},
     *      summary="Find All Books",
     *      description="A list of books",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="Success response",
     *          @OA\JsonContent(ref="#/components/schemas/success_find_all_books")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function findAll() {}

    /**
     * @OA\Get(
     *      path="/books/{bookId}",
     *      tags={"books"},
     *      summary="Find one book",
     *      description="Find one book by id",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\Parameter(
     *          description="ID of book",
     *          in="path",
     *          name="bookId",
     *          required=true,
     *          example="abcdef0123456789"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success response",
     *          @OA\JsonContent(ref="#/components/schemas/success_find_one_book")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function findOne() {}

    /**
     * @OA\Post(
     *      path="/books",
     *      tags={"books"},
     *      summary="Create a new book",
     *      description="Create a new book",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\RequestBody(ref="#/components/requestBodies/book_request_body"),
     *      @OA\Response(
     *          response=201,
     *          description="Success response",
     *          @OA\JsonContent(ref="#/components/schemas/success_create_a_new_book")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function create() {}

    /**
     * @OA\Patch(
     *      path="/books/{bookId}",
     *      tags={"books"},
     *      summary="Update a book by id",
     *      description="Update a book by id",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\Parameter(
     *          description="ID of book",
     *          in="path",
     *          name="bookId",
     *          required=true,
     *          example="abcdef0123456789"
     *      ),
     *      @OA\RequestBody(ref="#/components/requestBodies/book_request_body"),
     *      @OA\Response(
     *          response=200,
     *          description="Success response",
     *          @OA\JsonContent(ref="#/components/schemas/success_update_a_book")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *      path="/books/{bookId}",
     *      tags={"books"},
     *      summary="Delete a book by id",
     *      description="Delete a book by id",
     *      security={
     *         {"bearer": {}}
     *      },
     *      @OA\Parameter(
     *          description="ID of book",
     *          in="path",
     *          name="bookId",
     *          required=true,
     *          example="abcdef0123456789"
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="No content"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(ref="#/components/schemas/error_response")
     *      )
     * )
     */
    public function remove() {}
}
