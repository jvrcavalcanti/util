<?php

use Accolon\Util\Functional\Pipeline;

if (!function_exists('pipeline')) {
    function pipeline(mixed $inital): Pipeline
    {
        return Pipeline::create($inital);
    }
}
