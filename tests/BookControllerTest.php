<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class BookControllerTest extends TestCase
{
    use DatabaseMigrations;

    private $user;
    private $book;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory('App\Models\User')->create();
        $this->book = factory('App\Models\Book')->create();
    }

    /**
     * GET /books
     * GET /books/:id
     * POST /books
     * PATCH /books/:id
     * DELETE /books/:id
     *
     * @test
     */
    public function it_should_be_fail_when_authorization_token_absent()
    {
        // GET /books
        $this
            ->get('/books')
            ->seeStatusCode(401)
            ->seeJson([
                'message' => 'Unauthorized'
            ]);

        // GET /books/:id
        $this
            ->get('/books/someid')
            ->seeStatusCode(401)
            ->seeJson([
                'message' => 'Unauthorized'
            ]);

        // POST /books
        $this
            ->post('/books')
            ->seeStatusCode(401)
            ->seeJson([
                'message' => 'Unauthorized'
            ]);

        // PATCH /books/:id
        $this
            ->patch('/books/someid')
            ->seeStatusCode(401)
            ->seeJson([
                'message' => 'Unauthorized'
            ]);

        // DELETE /books:id
        $this
            ->delete('/books/someid')
            ->seeStatusCode(401)
            ->seeJson([
                'message' => 'Unauthorized'
            ]);
    }

    /**
     * GET /books/:id
     * PATCH /books/:id
     * DELETE /books/:id
     *
     * @test
     */
    public function it_should_be_fail_when_book_didnt_exists()
    {
        // GET /books/:id
        $this
            ->actingAs($this->user)
            ->get('/books/someid')
            ->seeStatusCode(404)
            ->seeJson([
                'message' => "Book #someid not found"
            ]);

        // PATCH /books/:id
        $this
            ->actingAs($this->user)
            ->patch('/books/someid')
            ->seeStatusCode(404)
            ->seeJson([
                'message' => "Book #someid not found"
            ]);

        // DELETE /books/:id
        $this
            ->actingAs($this->user)
            ->delete('/books/someid')
            ->seeStatusCode(404)
            ->seeJson([
                'message' => "Book #someid not found"
            ]);
    }

    /**
     * GET /books/:id
     *
     * @test
     */
    public function it_should_be_show_the_book_requested_by_id()
    {
        $url = "/books/" . $this->book->_id;
        $this
            ->actingAs($this->user)
            ->get($url)
            ->seeStatusCode(200)
            ->seeJson([
                '_id' => $this->book->_id,
                'title' => $this->book->title
            ]);
    }

    /**
     * POST /books
     *
     * @test
     */
    public function it_should_be_fail_to_store_new_book_when_some_book_data_missing_or_invalid()
    {
        $this
            ->actingAs($this->user)
            ->post('/books', [
                'title' => 'test',
                'published_year' => 'dua ribu dua satu'
            ])
            ->seeStatusCode(400);
    }

    /**
     * POST /books
     *
     * @test
     */
    public function it_should_be_store_new_book_in_database()
    {
        $this
            ->actingAs($this->user)
            ->post('/books', [
                'title' => 'test',
                'description' => 'test',
                'author' => 'test',
                'published_year' => '2021'
            ])
            ->seeStatusCode(201)
            ->seeInDatabase('books', [
                'title' => 'test'
            ]);
    }

    /**
     * PATCH /books/:id
     *
     * @test
     */
    public function it_should_be_fail_when_the_book_want_to_update_has_invalid_data()
    {
        $url = "/books/" . $this->book->_id;
        $this
            ->actingAs($this->user)
            ->patch($url, [
                'published_year' => 'dua ribu dua satu'
            ])
            ->seeStatusCode(400);
    }

    /**
     * PATCH /books/:id
     *
     * @test
     */
    public function it_should_be_update_the_book_requested_by_id()
    {
        $url = "/books/" . $this->book->_id;
        $this
            ->actingAs($this->user)
            ->patch($url, [
                'title' => 'title update',
                'published_year' => '2000'
            ])
            ->seeStatusCode(200)
            ->seeInDatabase('books', [
                'title' => 'title update',
                'author' => $this->book->author,
                'published_year' => '2000'
            ]);
    }

    /**
     * DELETE /books/:id
     *
     * @test
     */
    public function it_should_be_remove_the_book_from_database_requested_by_id()
    {
        $url = "/books/" . $this->book->_id;
        $this
            ->actingAs($this->user)
            ->delete($url)
            ->seeStatusCode(204)
            ->notSeeInDatabase('books', [
                '_id' => $this->book->_id
            ]);
    }

}
