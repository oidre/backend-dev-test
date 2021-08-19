<?php
namespace App\Services;

use App\Models\Book;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookService {
    public function findAll()
    {
        $books = Book::simplePaginate(10);

        if ($this->isPageAvaiable($books)) {
            throw new NotFoundHttpException("Book page not found");
        }
        return $books;
    }

    public function findOne(string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        return $book;
    }

    public function create($bookDto)
    {
        $book = Book::create($bookDto);
        return $book;
    }

    public function update($bookDto, $id)
    {
        $book = Book::find($id);
        if(!$book) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        $book->fill($bookDto);
        $book->save();
        return $book;
    }

    public function remove($id)
    {
        $book = Book::find($id);
        if(!$book) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        return $book->delete();
    }

    private function isPageAvaiable($books)
    {
        return empty($books->all());
    }
}
