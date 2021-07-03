<?php

namespace Accolon\Util\Buffer;

final class Buffer
{
    public static function stringToBuffer(string $string): array
    {
        return array_map(fn(string $char) => ord($char), str_split($string));
    }

    public static function bufferToString(array $buffer): string
    {
        return array_reduce($buffer, fn(string $string, int $byte) => $string . chr($byte), '');
    }
}
