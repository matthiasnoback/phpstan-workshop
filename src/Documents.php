<?php

declare(strict_types=1);

namespace Demo;

use ArrayIterator;
use Assert\Assertion;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int,Document>
 */
final class Documents implements IteratorAggregate
{
    /**
     * @var array<int,Document>
     */
    private array $documents;

    /**
     * @param array<int,Document> $documents
     */
    private function __construct(array $documents)
    {
        $this->documents = $documents;
    }

    /**
     * @param array<int,Document> $documents
     */
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
