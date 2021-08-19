<?php
namespace App\Services;

use App\Models\Book;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookService {

    /**
     * Create a new BookService instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Get list of books and paginate
     *
     * @return App\Models\Book
     */
    public function findAll()
    {
        $books = Book::simplePaginate(10);
        return $books;
    }

    /**
     * Find a book by id
     *
     * @param string id
     * @return App\Models\Book
     */
    public function findOne(string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        return $book;
    }

    /**
     * Create a new book
     *
     * @param Array Book Data Transfer Object
     * @return App\Models\Book
     */
    public function create($bookDto)
    {
        $book = Book::create($bookDto);
        return $book;
    }

    /**
     * Update a book by id
     *
     * @param Array Book Data Transfer Object
     * @param string id
     * @return App\Models\Book
     */
    public function update($bookDto, string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        $book->fill($bookDto);
        $book->save();
        return $book;
    }

    /**
     * Remove a book by id
     *
     * @param string id
     * @return App\Models\Book
     */
    public function remove(string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        return $book->delete();
    }
}
