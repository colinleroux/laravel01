<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Js;
use Psy\Util\Json;
use function PHPUnit\Framework\isNull;
/**
 * @group Languages
 * API's for languages.
 */
class LanguageApiController extends ApiBaseController
{
    use HttpResponses;

    /**
     * Display a listing of languages.
     *
     * @response {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "English",
     *       "code": "en",
     *       "description": "English language",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     },
     *     {
     *       "id": 2,
     *       "name": "Spanish",
     *       "code": "es",
     *       "description": "Spanish language",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     }
     *   ]
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $languages = Language::all();

        if (!is_null($languages) && $languages->count() > 0) {
            return $this->sendResponse(
                $languages,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Languages Found");
    }

    /**
     * Store a newly created language in storage.
     *
     * @bodyParams string $name The name of the language
     * @bodyParams string $code The code of the language
     * @bodyParams string $description The description of the language
     * @response {
     *   "id": 3,
     *   "name": "French",
     *   "code": "fr",
     *   "description": "French language",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = [
            'name' => $request['name'],
            'code' => $request['code'],
            'description' => $request['description'],
        ];

        $results = Language::create($validated);

        if (!is_null($results) && $results->count() > 0) {
            return $this->sendResponse(
                $results,
                "Created language successfully.",
            );
        }

        return $this->sendError("Unable to create language");
    }

    /**
     * Display the specified language.
     *
     * @response {
     *   "id": 1,
     *   "name": "English",
     *   "code": "en",
     *   "description": "English language",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $language = Language::find($id);

        if (isset($language) && $language->count() > 0) {
            return $this->sendResponse(
                $language,
                "Retrieved language successfully.",
            );
        }

        return $this->sendError("Language Not Found");
    }

    /**
     * Update the specified language in storage.
     *
     * @bodyParams string $name The updated name of the language
     * @bodyParams string $code The updated code of the language
     * @bodyParams string $description The updated description of the language
     * @response {
     *   "id": 1,
     *   "name": "English",
     *   "code": "en",
     *   "description": "Updated description",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 10:00:00"
     * }
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $language = Language::find($id);

        if (!is_null($language)) {
            $validated = [
                'name' => $request['name'] ?? $language['name'],
                'code' => isset($request['code']) ? $request['code'] : $language['code'],
                'description' => $request['description'] ?? $language['description'],
            ];

            $results = $language->update($validated);
        //print_r($results); removed count on boolean
            if (isset($results)) {
                return $this->sendResponse(
                    $results,
                    "Updated successfully.",
                );
            }
            return $this->sendError("Unable to update language");
        }

        return $this->sendError("Unable to update unknown language");

    }

    /**
     * Remove the specified language from storage.
     *
     * @response "Deleted successfully."
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $language = Language::find($id);
        $results = $language;

        if (!is_null($language) && $language->count() > 0) {

            $deleted = $language->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted successfully.");
            }
            return $this->sendError("Unable to delete language");
        }

        return $this->sendError("Unable to delete unknown language");
    }
}
