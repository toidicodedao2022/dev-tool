<?php

namespace App\Http\Responses;

class ResponseError extends ApiResponse
{
    public function __construct(int $status=500,string $content='', array $data=[])
    {
        parent::__construct($status,$content,$data);
    }
}
