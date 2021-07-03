<?php

use Accolon\Util\Base64\Base64;

it('should return the same string')
    ->expect(Base64::decode(Base64::encode('oi')))
    ->toBe('oi');

it('should return the same string, but using helpers')
    ->expect(base64_uri_decode(base64_uri_encode('oi')))
    ->toBe('oi');
