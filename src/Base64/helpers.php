<?php

use Accolon\Util\Base64\Base64;

if (!function_exists('base64_uri_encode')) {
    function base64_uri_encode(string $input): string
    {
        return Base64::encode($input);
    }
}

if (!function_exists('base64_uri_decode')) {
    function base64_uri_decode(string $input): string
    {
        return Base64::decode($input);
    }
}
