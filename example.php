<?php

declare(strict_types=1);

echo "This works fine\n";

function requiresAString(string $arg): void
{
}

requiresAString(123);
