<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends ApiController
{
    private $bookService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function findAll()
    {
        $books = $this->bookService->findAll();
        return $this->successResponse($books, 'List of books');
    }

    public function findOne(string $id)
    {
        $book = $this->bookService->findOne($id);
        return $this->successResponse($book, "Book #$id found");
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y'))
        ];
        $this->validate($request, $rules);

        $book = $this->bookService->create($request->all());

        return $this->successResponse($book, 'New book has been added.', 201);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'author' => 'max:255',
            'year' => 'digits:4|integer|min:1900|max:'.(date('Y'))
        ];
        $this->validate($request, $rules);

        $book = $this->bookService->update($request->all(), $id);

        return $this->successResponse($book, "Book #$id has been updated.");
    }

    public function remove($id)
    {
        $this->bookService->remove($id);
        return $this->withoutBodyResponse(204);
    }

}
