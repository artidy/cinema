<?php

namespace App\Http\Controllers;

use App\Http\Responses\Base;
use App\Http\Responses\Fail;
use App\Http\Responses\PaginatedResponse;
use App\Http\Responses\Success;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success(mixed $data): JsonResponse|Responsable
    {
        return new Success($data);
    }

    public function created(mixed $data): JsonResponse|Responsable
    {
        return new Success($data, Response::HTTP_CREATED);
    }

    public function noContent(mixed $data): JsonResponse|Responsable
    {
        return new Success($data, Response::HTTP_NO_CONTENT);
    }

    public function error(string $message): JsonResponse|Responsable
    {
        return new Fail($message);
    }

    protected function paginate($data, ?int $code = Response::HTTP_OK): PaginatedResponse
    {
        return new PaginatedResponse($data, $code);
    }
}
