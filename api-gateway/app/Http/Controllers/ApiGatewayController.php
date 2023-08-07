<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class ApiGatewayController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $serviceMapping = [
            'users' => 'user-service',
            'boards' => 'board-service',
            'lanes' => 'lane-service',
            'tickets' => 'ticket-service'
        ];

        $routeKey = $request->segment(1);
        $serviceName = $serviceMapping[$routeKey] ?? null;

        if (!$serviceName) {
            return response(['error' => 'Invalid route.'], Response::HTTP_BAD_REQUEST);
        }

        $baseUri = config("services.$serviceName.base_uri");
        $uri = $baseUri . '/' . implode('/', $request->segments());

        try {
            $response = Http::withHeaders($request->headers->all())
                ->send($request->method(), $uri, $request->all());

            return response($response->body(), $response->status())
                ->withHeaders($response->headers());

        } catch (\Exception $e) {
            return response(['error' => 'Service error.'], Response::HTTP_BAD_GATEWAY);
        }
    }
}