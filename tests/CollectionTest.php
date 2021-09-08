<?php

it('should return array with double of value initial')
    ->expect(
        collection([2, 3, 4])
            ->map(fn($value) => $value * 2)
            ->toArray()
    )
    ->toBe([4, 6, 8]);

it('should return array with double of value initial, but with helper')
    ->expect(
        map([2, 3, 4], fn($value) => $value * 2)
    )
    ->toBe([4, 6, 8]);
