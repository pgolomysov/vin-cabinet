<?php

namespace App\Http\Controllers;

use App\Facades\Sources;
use App\Http\Requests\RequestStoreRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use \App\Models\Request as RequestModel;

class RequestController extends Controller
{
    use ValidatesRequests;

    public function index(): JsonResponse
    {
        return $this->response(RequestModel::with('reports')->get());
    }

    public function store(RequestStoreRequest $request)
    {
        $model = RequestModel::createWithDefaultUser($request->validated());

        if ($model) {
            Sources::createAndPushToQueueAll($model);
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
