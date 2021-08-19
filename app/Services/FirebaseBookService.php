<?php
namespace App\Services;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FirebaseBookService {
    private $firebase;

    /**
     * Create a new FirebaseBookService instance.
     *
     * @return void
     */
    public function __construct() {
        $this->firebase = app('firebase.firestore')->database()->collection('books');
    }

    /**
     * Get list of books
     *
     * @return Array book
     */
    public function findAll()
    {
        $bookRefs = $this->firebase->documents();
        $books = $this->mapDocuments($bookRefs);
        return $books;
    }

    /**
     * Find a book by id
     *
     * @param string id
     * @return Object book
     */
    public function findOne(string $id)
    {
        $bookSnapshot = $this->firebase->document($id)->snapshot();
        if(!$bookSnapshot->exists()) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        $book = $this->snapshotWithId($bookSnapshot);
        return $book;
    }

    /**
     * Create a new book
     *
     * @param Array Book Data Transfer Object
     * @return Array book
     */
    public function create($bookDto)
    {
        $bookRef = $this->firebase->add($bookDto);
        $book = $this->snapshotWithId($bookRef->snapshot());
        return $book;
    }

    /**
     * Update a book by id
     *
     * @param Array Book Data Transfer Object
     * @param string id
     * @return Object book
     */
    public function update($bookDto, string $id)
    {
        $bookRef = $this->firebase->document($id);
        if(!$bookRef->snapshot()->exists()) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        $bookDto = $this->mapIntoDtoFirebase($bookDto);
        $bookRef->update($bookDto);
        $book = $this->snapshotWithId($bookRef->snapshot());

        return $book;
    }

    /**
     * Remove a book by id
     *
     * @param string id
     * @return null
     */
    public function remove(string $id)
    {
        $bookRef = $this->firebase->document($id);
        if(!$bookRef->snapshot()->exists()) {
            throw new NotFoundHttpException("Book #$id not found");
        }
        return $bookRef->delete();
    }

    /**
     * Merge snapshot id and data
     *
     * @param documents instance
     * @return Array documents
     */
    private function mapDocuments($documents)
    {
        $docs = collect($documents);
        return $docs->map(function ($value) {
            return $this->snapshotWithId($value);
        })->toArray();
    }

    /**
     * Merge snapshot id and data
     *
     * @param snapshot instance
     * @return Array snapshot merge
     */
    private function snapshotWithId($snapshot) {
        $snapshotCollection = collect($snapshot->data());
        $snapshotMerge = $snapshotCollection->merge(['id' => $snapshot->id()]);

        return $snapshotMerge->toArray();
    }

    /**
     * Map dto into array dto firebase
     *
     * @param Array dto ['name' => 'lumen']
     * @return Array dto firebase ['path' => 'name', 'value' => 'lumen']
     */
    private function mapIntoDtoFirebase($dto)
    {
        $dtoCollection = collect($dto);
        $dto = $dtoCollection->map(function ($item, $key) {
            return ['path' => $key, 'value' => $item];
        })->values()->toArray();

        return $dto;
    }
}
