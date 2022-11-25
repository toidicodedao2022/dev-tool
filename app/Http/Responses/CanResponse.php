<?php

namespace App\Http\Responses;

interface CanResponse
{
    /**
     * @return array
     */
    public function toArray(): array;
}