<?php

namespace App\Http\Responses;

class ResponseSuccess extends ApiResponse
{
    public function __construct(public array $data=[], string $content='')
    {
        parent::__construct(200,$content,$this->data);
    }
}