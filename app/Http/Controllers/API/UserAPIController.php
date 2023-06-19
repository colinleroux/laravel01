<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAPIRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserAPIController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
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
     */
    public function store(Request $request)
    {
        return $this->sendError("Method Not Found");
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->sendError("Method Not Found");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->sendError("Method Not Found");
    }
}
