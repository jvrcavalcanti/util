<?php

use Accolon\Util\Buffer\Buffer;

it('should return array buffer with code points')
    ->expect(Buffer::stringToBuffer('Hello World!'))
    ->toBe([72, 101, 108, 108, 111, 32, 87, 111, 114, 108, 100, 33]);

it('should return string of array buffer')
    ->expect(Buffer::bufferToString([72, 101, 108, 108, 111, 32, 87, 111, 114, 108, 100, 33]))
    ->toBe('Hello World!');

it('should return the same string')
    ->expect(Buffer::bufferToString(Buffer::stringToBuffer('Hello World!')))
    ->toBe('Hello World!');

it('should return array buffer with code points, but using helpers')
    ->expect(string_to_buffer('Hello World!'))
    ->toBe([72, 101, 108, 108, 111, 32, 87, 111, 114, 108, 100, 33]);

it('should return string of array buffer, but using helpers')
    ->expect(buffer_to_string([72, 101, 108, 108, 111, 32, 87, 111, 114, 108, 100, 33]))
    ->toBe('Hello World!');

it('should return the same string, but using helpers')
    ->expect(buffer_to_string(string_to_buffer('Hello World!')))
    ->toBe('Hello World!');
