<?php
namespace App\Http\Responses;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class Base implements Responsable
{
    public function __construct(
        protected mixed $data = [],
        public int $statusCode = Response::HTTP_OK,
    ) {
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request $request
     * @return JsonResponse|Responsable
     */
    public function toResponse($request): JsonResponse|Responsable
    {
        return response()->json($this->makeResponseData(), $this->statusCode);
    }

    /**
     * Преобразование возвращаемых данных к массиву.
     *
     * @return array
     */
    protected function prepareData(): array
    {
        if ($this->data instanceof Arrayable) {
            return $this->data->toArray();
        }

        if (!is_array($this->data)) {
            $this->data = [$this->data];
        }

        return $this->data;
    }

    /**
     * Формирование содержимого ответа.
     *
     * @return array|null
     */
    abstract protected function makeResponseData(): ?array;
}
