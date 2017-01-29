<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;

trait GeoExceptionHandlerTrait
{
    /**
     * Returns json response for generic bad request.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message='Bad request', $statusCode=400)
    {
        return $this->jsonResponse([
            'error' => $message,
            'moreInfo' => 'Please email xuedoris0106@hotmail.com with your error message and request details for more info.'
            ], 
        $statusCode);
    }

    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload=null, $statusCode=404)
    {
        $payload = $payload ?: [];
        return response()->json($payload, $statusCode);
    }
}