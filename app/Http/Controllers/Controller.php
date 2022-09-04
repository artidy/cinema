<?php

namespace App\Http\Controllers;

use App\Http\Responses\Base;
use App\Http\Responses\Fail;
use App\Http\Responses\Success;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function send(Base $result): Response
    {
        return $result->toResponse(new Request());
    }

    public function success(mixed $data): Response
    {
        $result = new Success($data);

        return $this->send($result);
    }

    public function created(mixed $data): Response
    {
        $result = new Success($data, Response::HTTP_CREATED);

        return $this->send($result);
    }

    public function noContent(mixed $data): Response
    {
        $result = new Success($data, Response::HTTP_NO_CONTENT);

        return $this->send($result);
    }

    public function error(string $message): Response
    {
        $result = new Fail($message);

        return $this->send($result);
    }
}
