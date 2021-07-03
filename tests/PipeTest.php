<?php

use Accolon\Util\Functional\pipelineline;

class People
{
    public function __construct(private int $age = 18)
    {
        //
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
        return $this->age;
    }
}

it('1 pipeline Callable')
    ->expect(
        pipeline([2, 2])
        ->pipe(fn($arr) => array_sum($arr))
        ->run()
    )->toBe(4);

it('1 pipeline String')
    ->expect(
        pipeline([2, 2])
        ->pipe('array_sum')
        ->run()
    )->toBe(4);

it('1 pipeline Array Object')
    ->expect(
        pipeline(20)
        ->pipe([new People(18), 'setAge'])
        ->run()
    )->toBe(20);

it('1 pipeline Array String')
    ->expect(
        pipeline(20)
        ->pipe([People::class, 'getAge'])
        ->run()
    )->toBe(18);

it('Multi args')
    ->expect(
        pipeline([2, 2])
        ->pipe('array_merge', [1, 3])
        ->run()
    )->toBe([2, 2, 1, 3]);

it('Multi pipelines 1')
    ->expect(
        pipeline([2, 2])
        ->pipe('array_merge', [1, 3])
        ->pipe('array_sum')
        ->pipe('intval')
        ->run()
    )->toBeInt()->toBe(8);

it('Multi pipelines 2')
    ->expect(
        pipeline([2, 2])
        ->pipe('array_merge', [1, 3])
        ->pipe('array_sum')
        ->pipe(fn($sum) => $sum * $sum)
        ->run()
    )->toBe(64);
