<?php

namespace App\Traits;

use Exception;

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
     * @todo need to support other format in response such as CSV and etc.
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload=null, $statusCode=400)
    {
        $payload = $payload ?: [];
        return response()->json($payload, $statusCode);
    }
}