<?php

namespace App\Http\Responses;

class ApiResponse implements CanResponse
{
    public int $status;
    public string $content;
    public array $data;
    /**
     * @return array
     */
    public function response(): array
    {
        return [
            'status' => $this->status,
            'content' => $this->content,
            'data' => (object)$this->data
        ];
    }
}