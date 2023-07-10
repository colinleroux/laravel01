<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAPIRequest;
use App\Http\Requests\StoreGenreAPIRequest;
use App\Http\Requests\UpdateGenreAPIRequest;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Js;
use Psy\Util\Json;
use function PHPUnit\Framework\isNull;
/**
 * @group Genres
 * APIs for managing genres
 *
 */
class GenreApiController extends ApiBaseController
{
    /**
     * Display a listing of the genres
     *
     * @bodyParams int $per_page The number of genres per page (default: 15)
     * @response {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Action",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     },
     *     {
     *       "id": 2,
     *       "name": "Comedy",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     }
     *   ],
     *   "links": {
     *     "first": "http://localhost/api/genres?page=1",
     *     "last": "http://localhost/api/genres?page=2",
     *     "prev": null,
     *     "next": "http://localhost/api/genres?page=2"
     *   },
     *   "meta": {
     *     "current_page": 1,
     *     "from": 1,
     *     "last_page": 2,
     *     "path": "http://localhost/api/genres",
     *     "per_page": 15,
     *     "to": 15,
     *     "total": 25
     *   }
     * }
     * @param PaginationAPIRequest $request
     * @return JsonResponse
     */
    public function index(PaginationAPIRequest $request): JsonResponse
    {
        $genres = Genre::paginate($request['per_page']);

        if (!is_null($genres) && $genres->count() > 0) {
            return $this->sendResponse(
                $genres,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Genres Found");
    }

    /**
     * Store a new genre
     *
     * @bodyParams string $name The name of the genre
     * @response {
     *   "id": 3,
     *   "name": "Drama",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @param StoreGenreAPIRequest $request
     * @return JsonResponse
     */
    public function store(StoreGenreAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $results = Genre::create($validated);

        if (!is_null($results) && $results->count() > 0) {
            return $this->sendResponse(
                $results,
                "Created genre successfully.",
            );
        }

        return $this->sendError("Unable to create genre");
    }

    /**
     * Display a genre
     *
     * @response {
     *   "id": 1,
     *   "name": "Action",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @param string $uuid
     * @return JsonResponse
     */
    public function show(string $uuid): JsonResponse
    {

        $genre = Genre::whereUuid($uuid)->first();

        if (isset($genre) && $genre->count() > 0) {
            return $this->sendResponse(
                $genre,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Genre Not Found");
    }

    /**
     * Update a genre
     *
     * @bodyParams string $name The updated name of the genre
     * @response {
     *   "id": 1,
     *   "name": "Thriller",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:15:00"
     * }
     * @param UpdateGenreAPIRequest $request
     * @param string $uuid
     * @return JsonResponse
     */
    public function update(UpdateGenreAPIRequest $request, string $uuid): JsonResponse
    {
        $genre = Genre::whereUuid($uuid)->first();

        if (isset($genre) && !is_null($genre)) {

            $validated = $request->validated();

            $isUpdated = $genre->update($validated);

            if ($isUpdated && $genre->count() > 0) {
                return $this->sendResponse(
                    $genre,
                    "Updated genre successfully.",
                );
            }
            return $this->sendError("Unable to update genre");
        }

        return $this->sendError("Unable to update unknown genre");
    }

    /**
     * Remove a genre
     *
     * @response "Deleted genre successfully."
     * @param string $uuid
     * @return JsonResponse
     */
    public function destroy(string $uuid): JsonResponse
    {
        $genre = Genre::whereUuid($uuid)->first();
        $results = $genre;

        if (!is_null($genre) && $genre->count() > 0) {

            $deleted = $genre->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted genre successfully.");
            }
            return $this->sendError("Unable to delete genre");
        }

        return $this->sendError("Unable to delete unknown genre");
    }
}
