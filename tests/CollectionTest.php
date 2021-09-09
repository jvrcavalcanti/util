<?php

it('should return an array with double ofs values initials')
    ->expect(
        collection([2, 3, 4])
            ->map(fn($value) => $value * 2)
            ->toArray()
    )
    ->toBe([4, 6, 8]);

it('should return an array with double ofs values initials, but with helper')
    ->expect(
        map([2, 3, 4], fn($value) => $value * 2)
    )
    ->toBe([4, 6, 8]);

it('should return an array with only positive numbers')
    ->expect(
        collection([-1, 2, 3, -43, -4])
            ->filter(fn($number) => $number > 0)
            ->toArray()
    )
    ->toBe([2, 3]);

it('should return an array with only positive numbers, but with helper')
    ->expect(
        filter([-1, 2, 3, -43, -4], fn($number) => $number > 0)
    )
    ->toBe([2, 3]);

it('should return array sum')
    ->expect(
        collection([1, 2, 3, 4, 5])
            ->reduce(fn($sum, $number) => $sum + $number, 0)
    )
    ->toBe(15);

it('should return array sum, but with helper')
    ->expect(
        reduce([1, 2, 3, 4, 5], fn($sum, $number) => $sum + $number, 0)
    )
    ->toBe(15);

it('should return true to contains')
    ->expect(
        collection([1, 2, 3, 4, 5])
            ->contains(fn($number) => $number === 2)
    )
    ->toBeTrue();

it('should return false to contains')
    ->expect(
        collection([1, 2, 3, 4, 5])
            ->contains(fn($number) => $number === 6)
    )
    ->toBeFalse();

it('should return value requested')
    ->expect(
        collection([1, 2, 3, 4, 5])
            ->find(fn($number) => $number === 2)
    )
    ->toBe(2);
