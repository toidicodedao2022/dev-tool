<?php

namespace App\Http\Responses;

class ApiResponse implements CanResponse
{
    public function __construct(public int $status,public string $content, public array $data)
    {

    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'content' => $this->content,
            'data' => $this->data
        ];
    }
}