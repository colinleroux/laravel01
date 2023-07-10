<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
/**
 * @group Books
 * APIs for books.
 */
class BookAPIController extends ApiBaseController
{
    /**
     * @group Books
     * Display a listing of books.
     *
     * @response {
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "Book 1",
     *       "author": "John Doe",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     },
     *     {
     *       "id": 2,
     *       "title": "Book 2",
     *       "author": "Jane Smith",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     }
     *   ]
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $books = Book::all();

        if (!is_null($books) && $books->count() > 0) {
            return $this->sendResponse(
                $books,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Books Found");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
