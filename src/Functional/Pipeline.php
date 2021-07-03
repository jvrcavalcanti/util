<?php

namespace Accolon\Util\Functional;

class Pipeline
{
    use ResolveAction;

    public function __construct(private mixed $value)
    {
        //
    }

    public function pipe(array|string|callable $action, mixed ...$args): self
    {
        $this->value = $this->resolveAction($action)($this->value, ...$args);
        return $this;
    }

    public function run(): mixed
    {
        return $this->value;
    }

    public static function create(mixed $value): self
    {
        return new self($value);
    }
}
