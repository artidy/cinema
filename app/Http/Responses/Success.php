<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

class Success extends Base
{
    /**
     * ExceptionResponse constructor.
     *
     * @param $data
     * @param int $code
     */
    public function __construct($data, int $code = Response::HTTP_OK)
    {
        parent::__construct($data, $code);
    }

    /**
     * Формирование содежимого ответа.
     *
     * @return array
     */
    protected function makeResponseData(): array
    {
        return [
            'data' => $this->prepareData(),
        ];
    }
}
