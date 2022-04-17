<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreRequest;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use \App\Models\Request as RequestModel;

class RequestController extends Controller
{
    use ValidatesRequests;

    public function index(): JsonResponse
    {
        return response()->json(["test" => 1]);
    }

    public function store(RequestStoreRequest $request)
    {
        $attributes = array_merge(['user_id' => 1],$request->validated());

        try {
            $model = RequestModel::create($attributes);
        } catch (QueryException $e) {
            return $this->response([], false, 'Error occurred while saving request');
        }

        return $this->response($model);
    }

    public function show(): JsonResponse
    {
        return response()->json(["test" => 3]);
    }

    public function destroy(): JsonResponse
    {
        return response()->json(["test" => 4]);
    }
}
