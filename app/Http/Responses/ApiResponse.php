<?php

namespace App\Http\Responses;
/**
 * @property int $status
 * @property string $content
 * @property array $data
 */
abstract class ApiResponse
{
    /**
     * @param int    $status
     * @param string $content
     * @param array  $data
     */
    public function __construct(protected int $status,protected string $content, protected array $data=[])
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
            'data' => (object)$this->data
        ];
    }
}