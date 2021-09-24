<?php

declare(strict_types=1);

namespace Demo;

final class DocumentRepository
{
    public function allDocuments(): Documents
    {
        return Documents::fromArray([]);
    }
}
