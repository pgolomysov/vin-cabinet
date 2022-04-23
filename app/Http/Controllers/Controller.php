<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response(mixed $data, bool $success = true, string $message = '')
    {
        $response = [
            'success' => $success,
            'data' => $data,
        ];

        if ($message) {
            $response['message'] = $message;
        }

        //TODO: rewrite 500 response to exception, that caught in handler
        return response()->json($response, $success ? 200 : 500);
    }
}
