<?php

namespace App\Http\Responses;

class ResponseSuccess extends ApiResponse
{
    public function __construct(public array $data = [], string $content = '', int $status = 200)
    {
        parent::__construct($status, $content, $data);
    }
}
