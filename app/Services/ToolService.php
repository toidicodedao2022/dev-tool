<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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

    /**
     * @param array $params
     *
     * @return string
     */
    public function random(array $params): string
    {
        $options = (array)Arr::get($params,'chars',[]);
        if(count($options)==0){
            return '';
        }
        $length = abs((int)Arr::get($params,'length',1));
        if($length<1){
            return '';
        }

        $chars = collect([
            'a_z' => 'abcdefghijklmnopqrstuvwxyz',
            'A_Z' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '0_9' => range(0,9),
            'special' => '!@#$%^&*()+'
        ])->only($options)->join('');
        $lengthChars = mb_strlen($chars);

    }
}