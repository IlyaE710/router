<?php

namespace App\router;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;

class JsonResponse
{
    public static function create(ResponseInterface $response, $data, int $statusCode = 200): \Psr\Http\Message\MessageInterface|ResponseInterface
    {
        $stream = Utils::streamFor(json_encode($data));

        return $response
            ->withHeader('Content-type', 'application/json')
            ->withBody($stream)
            ->withStatus($statusCode);
    }
}
