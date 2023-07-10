<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
/**
 * @group Authors
 * APIs for managing the Authors.
 */
class AuthorAPIController extends ApiBaseController
{
    /**
     * Display a listing of the authors.
     *
     * @response {
     *     "status": true,
     *      "message": "Retrieved successfully",
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "John Doe",
     *       "email": "johndoe@example.com",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     },
     *     {
     *       "id": 2,
     *       "name": "Jane Smith",
     *       "email": "janesmith@example.com",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     }
     *   ]
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $authors = Author::all();

        if (!is_null($authors) && $authors->count() > 0) {
            return $this->sendResponse(
                $authors,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Authors Found");
    }

    /**
     * Store a newly created author.
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
