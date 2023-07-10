<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
/**
 * @group Publishers
 * API's for the publishers.
 */
class PublisherAPIController extends ApiBaseController
{
    /**
     * Display a listing of publishers.
     *
     * @response {
     *   "current_page": 1,
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Publisher 1",
     *       "city": "City 1",
     *       "country_code": "US",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     },
     *     {
     *       "id": 2,
     *       "name": "Publisher 2",
     *       "city": "City 2",
     *       "country_code": "UK",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     }
     *   ],
     *   "first_page_url": "http://localhost/api/publishers?page=1",
     *   "from": 1,
     *   "last_page": 5,
     *   "last_page_url": "http://localhost/api/publishers?page=5",
     *   "next_page_url": "http://localhost/api/publishers?page=2",
     *   "path": "http://localhost/api/publishers",
     *   "per_page": 10,
     *   "prev_page_url": null,
     *   "to": 10,
     *   "total": 50
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $publishers = Publisher::paginate(10);

        return response()->json($publishers);
    }

    /**
     * Store a newly created publisher in storage.
     *
     * @bodyParams string $name The name of the publisher
     * @bodyParams string $city The city of the publisher
     * @bodyParams string $country_code The country code of the publisher
     * @response {
     *   "id": 3,
     *   "name": "Publisher 3",
     *   "city": "City 3",
     *   "country_code": "DE",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country_code' => 'required',
        ]);

        $publisher = Publisher::create($request->all());

        return response()->json($publisher, 201);
    }

    /**
     * Display the specified publisher.
     *
     * @response {
     *   "id": 1,
     *   "name": "Publisher 1",
     *   "city": "City 1",
     *   "country_code": "US",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $publisher = Publisher::findOrFail($id);

        return response()->json($publisher);
    }

    /**
     * Update the specified publisher in storage.
     *
     * @bodyParams string $name The updated name of the publisher
     * @bodyParams string $city The updated city of the publisher
     * @bodyParams string $country_code The updated country code of the publisher
     * @response {
     *   "id": 1,
     *   "name": "Publisher 1",
     *   "city": "Updated City",
     *   "country_code": "US",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 10:00:00"
     * }
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country_code' => 'required',
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->update($request->all());

        return response()->json($publisher);
    }

    /**
     * Remove the specified publisher from storage.
     *
     * @response {
     *   "message": "Publisher deleted successfully"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response()->json(['message' => 'Publisher deleted successfully']);
    }
}
