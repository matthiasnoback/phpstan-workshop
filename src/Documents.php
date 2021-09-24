<?php

declare(strict_types=1);

namespace Demo;

use ArrayIterator;
use Assert\Assertion;
use IteratorAggregate;

final class Documents implements IteratorAggregate
{
    private array $documents;

    private function __construct(array $documents)
    {
        $this->documents = $documents;
    }

    public static function fromArray(array $documents): self
    {
        Assertion::allIsInstanceOf($documents, Document::class);

        return new self($documents);
    }

    public function getIterator(): iterable
    {
        return new ArrayIterator($this->documents);
    }
}
