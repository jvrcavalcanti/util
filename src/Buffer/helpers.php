<?php

use Accolon\Util\Buffer\Buffer;

if (!function_exists('string_to_buffer')) {
    function string_to_buffer(string $str): array
    {
        return Buffer::stringToBuffer($str);
    }
}

if (!function_exists('buffer_to_string')) {
    function buffer_to_string(array $buf): string
    {
        return Buffer::bufferToString($buf);
    }
}
