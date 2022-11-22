<?php

namespace App\Services;

class ToolService
{
    public function __construct()
    {
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public function md5(string $str): string
    {
        return md5($str);
    }

    /**
     * @param string $str
     * @param string $type
     *
     * @return string
     */
    public function base64(string $str, string $type): string
    {
        if ($type === "DECODE") {
            return (string)base64_decode($str);
        }

        return base64_encode($str);
    }
}