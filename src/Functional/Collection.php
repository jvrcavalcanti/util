<?php

declare(strict_types=1);

namespace Accolon\Util\Functional;

class Collection
{
    use ResolveAction;

    public function __construct(private array $data = [])
    {
        //
    }

    public function map(array|string|callable $action): self
    {
        $action = $this->resolveAction($action);

        $new = [];

        foreach ($this->data as $key => $value) {
            $new[$key] = $action($value, $key, array_clone($this->data));
        }

        $this->data = $new;

        return $this;
    }

    public function filter(array|string|callable $action): self
    {
        $action = $this->resolveAction($action);

        $new = [];

        foreach ($this->data as $key => $value) {
            if ($action($value, $key, array_clone((array) $this->data))) {
                $new[] = $value;
            }
        }

        $this->data = $new;

        return $this;
    }

    public function reduce(array|string|callable $action, mixed $initial = null): mixed
    {
        $action = $this->resolveAction($action);

        $carry = $initial;

        foreach ($this->data as $key => $value) {
            $carry = $action($carry, $value, $key);
        }

        return $carry;
    }

    public function contains(array|string|callable $action): bool
    {
        $action = $this->resolveAction($action);

        foreach ($this->data as $key => $value) {
            if ($action($value, $key, array_clone((array) $this->data))) {
                return true;
            }
        }

        return false;
    }

    public function find(array|string|callable $action): mixed
    {
        $action = $this->resolveAction($action);

        foreach ($this->data as $key => $value) {
            if ($action($value, $key, array_clone((array) $this->data))) {
                return $value;
            }
        }

        return null;
    }

    public function all(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
