<?php

namespace Pakdhe\Response\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Str;

trait ApiResponser
{
    /**
     * Success Response
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message="OK", $data=null,  $code = Response::HTTP_OK)
    {
        return response()->json([
                'data' => $data,
                'message' => $message
            ], $code);
    }

    public function errorResponse($message, $code = Response::HTTP_PRECONDITION_FAILED, $status_code=10)
    {
        return response()->json([
                'message' => $message,
                'status_code' => $status_code
            ], $code);
    }

    public function jsonSuccessResponse($data=null, $message="success")
    {
        return array('success' => true, 'message' => $message, 'data' => $data);
    }

    public function jsonErrorResponse($message="error", $data=null)
    {
        return array('success' => false, 'message' => $message, 'data' => $data);
    }
}
