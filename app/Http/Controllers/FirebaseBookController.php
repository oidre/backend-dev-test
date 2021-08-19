<?php

namespace App\Http\Controllers;

use App\Services\FirebaseBookService;
use Illuminate\Http\Request;

class FirebaseBookController extends ApiController
{
    private $firebaseBookService;

    /**
     * Create a new FirebaseBookController instance.
     *
     * @return void
     */
    public function __construct(FirebaseBookService $firebaseBookService)
    {
        $this->firebaseBookService = $firebaseBookService;
    }

    /**
     * Get list of book
     * GET /firebase-books
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findAll()
    {
        $books = $this->firebaseBookService->findAll();
        return $this->successResponse($books, 'List of books');
    }

    /**
     * Get a book by id
     * GET /firebase-books/:id
     *
     * @param string id
     * @return \Illuminate\Http\JsonResponse
     */
    public function findOne(string $id)
    {
        $book = $this->firebaseBookService->findOne($id);
        return $this->successResponse($book, "Book #$id found");
    }

    /**
     * Create a new book
     * POST /firebase-books
     *
     * @param \Illuminate\Http\Request Book Data Transfer Object
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'author' => 'required|max:255',
            'published_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y'))
        ];
        $this->validate($request, $rules);

        $book = $this->firebaseBookService->create($request->only([
            'title',
            'description',
            'author',
            'published_year'
        ]));

        return $this->successResponse($book, 'New book has been added.', 201);
    }

    /**
     * Update a book by id
     * PATCH /firebase-books/:id
     *
     * @param \Illuminate\Http\Request Book Data Transfer Object
     * @param string id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'author' => 'max:255',
            'published_year' => 'digits:4|integer|min:1900|max:'.(date('Y'))
        ];
        $this->validate($request, $rules);

        $book = $this->firebaseBookService->update($request->only([
            'title',
            'description',
            'author',
            'published_year'
        ]), $id);

        return $this->successResponse($book, "Book #$id has been updated.");
    }

    /**
     * Remove a book by id
     * DELETE /firebase-books/:id
     *
     * @param string id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(string $id)
    {
        $this->firebaseBookService->remove($id);
        return $this->withoutBodyResponse(204);
    }

}
