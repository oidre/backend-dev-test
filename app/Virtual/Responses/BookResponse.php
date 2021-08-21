<?php

/**
 * @OA\Schema(
 *      schema="success_find_all_books",
 *      description="Success find all books",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="A list of books"
 *      ),
 *      @OA\Property(
 *          property="data",
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Book"),
 *      )
 * )
 *
 * @OA\Schema(
 *      schema="success_find_one_book",
 *      description="Success find one book",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="Book by id"
 *      ),
 *      @OA\Property(
 *          property="data",
 *          ref="#/components/schemas/Book",
 *      )
 * )
 *
 * @OA\Schema(
 *      schema="success_create_a_new_book",
 *      description="Success create a new book",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="New book has been added"
 *      ),
 *      @OA\Property(
 *          property="data",
 *          ref="#/components/schemas/Book",
 *      )
 * )
 *
 * @OA\Schema(
 *      schema="success_update_a_book",
 *      description="Success update a book",
 *      @OA\Property(
 *          property="status",
 *          example="Success"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          example="Book has been updated"
 *      ),
 *      @OA\Property(
 *          property="data",
 *          ref="#/components/schemas/Book",
 *      )
 * )
 */
