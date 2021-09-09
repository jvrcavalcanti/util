<?php

use Accolon\Util\Functional\Collection;
use Accolon\Util\Functional\Pipeline;

if (!function_exists('pipeline')) {
    function pipeline(mixed $inital): Pipeline
    {
        return Pipeline::create($inital);
    }
}

if (!function_exists('array_clone')) {
    function array_clone(array $arr): array
    {
        $obj = (object) $arr;
        $obj2 = clone $obj;
        $arr2 = (array) $obj2;
        return $arr2;
    }
}

if (!function_exists('collection')) {
    function collection(array $arr): Collection
    {
        return new Collection($arr);
    }
}

if (!function_exists('map')) {
    function map(array $arr, array|string|callable $action): array
    {
        return collection($arr)->map($action)->toArray();
    }
}

if (!function_exists('filter')) {
    function filter(array $arr, array|string|callable $action): array
    {
        return collection($arr)->filter($action)->toArray();
    }
}

if (!function_exists('reduce')) {
    function reduce(array $arr, array|string|callable $action, mixed $initial = null): mixed
    {
        return collection($arr)->reduce($action);
    }
}
