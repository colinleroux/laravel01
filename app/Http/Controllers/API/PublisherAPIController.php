<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublisherAPIController extends ApiBaseController
{
    /**
     * Display a listing of the publishers.
     */
    public function index(): JsonResponse
    {
        $publishers = Publisher::paginate(10);

        return response()->json($publishers);
    }

    /**
     * Store a newly created publisher in storage.
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
     */
    public function show(int $id): JsonResponse
    {
        $publisher = Publisher::findOrFail($id);

        return response()->json($publisher);
    }

    /**
     * Update the specified publisher in storage.
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
     */
    public function destroy(int $id): JsonResponse
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response()->json(['message' => 'Publisher deleted successfully']);
    }
}
