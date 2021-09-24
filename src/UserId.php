<?php

declare(strict_types=1);

namespace Demo;

use Assert\Assertion;

final class UserId
{
    private function __construct(int $id)
    {
        Assertion::greaterThan($id, 0);
    }

    public static function fromInt(int $id): self
    {
        return new self($id);
    }
}
