<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAPIRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * @group Users
 * API's for user management.
 */
class UserAPIController extends ApiBaseController
{
    /**
     * Display a listing of users.
     *
     * @bodyParams int $page The page number (default: 1)
     * @bodyParams int $per_page The number of users per page (default: 3)
     * @response {
     *   "current_page": 1,
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Colin Ford",
     *       "email": "colin@example.com",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     },
     *     {
     *       "id": 2,
     *       "name": "Jane Peters",
     *       "email": "janep@example.com",
     *       "created_at": "2023-07-10 09:00:00",
     *       "updated_at": "2023-07-10 09:00:00"
     *     }
     *   ],
     *   "first_page_url": "http://localhost/api/users?page=1",
     *   "from": 1,
     *   "last_page": 5,
     *   "last_page_url": "http://localhost/api/users?page=5",
     *   "next_page_url": "http://localhost/api/users?page=2",
     *   "path": "http://localhost/api/users",
     *   "per_page": 3,
     *   "prev_page_url": null,
     *   "to": 3,
     *   "total": 15
     * }
     * @param PaginationAPIRequest $request
     * @return JsonResponse
     */
public function index(PaginationAPIRequest $request):JsonResponse
    {
        $users = User::paginate(3);
        if (!is_null($users) && $users->count() > 0) {
            return $this->sendResponse(
                $users,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Users Found");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @bodyParams string $name The name of the user
     * @bodyParams string $email The email of the user
     * @response {
     *   "error": "Method Not Found"
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->sendError("Method Not Found");
    }

    /**
     * Display the specified user.
     *
     * @response {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "johndoe@example.com",
     *   "created_at": "2023-07-10 09:00:00",
     *   "updated_at": "2023-07-10 09:00:00"
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id):JsonResponse
    {
        $user = User::find($id);
        if (isset($user) && $user->count() > 0) {
            return $this->sendResponse(
                $user,
                "User retrieved successfully",
            );
        }
        return $this->sendError("User Not Found");
    }

    /**
     * Update the specified user
     *
     * @bodyParams string $name The updated name of the user
     * @bodyParams string $email The updated email of the user
     * @response {
     *   "error": "Method Not Found"
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        return $this->sendError("Method Not Found");
    }

    /**
     * Remove the specified user.
     *
     * @response {
     *   "error": "Method Not Found"
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        return $this->sendError("Method Not Found");
    }
}
