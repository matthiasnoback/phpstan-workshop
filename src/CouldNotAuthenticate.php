<?php

declare(strict_types=1);

namespace Demo;

use RuntimeException;

final class CouldNotAuthenticate extends RuntimeException
{
    public static function becauseUserNotFound(string $username): self
    {
        return new self(sprintf('Could not find a user with username "%s"'));
    }

    public static function becauseAccountIsExpired(string $username): self
    {
        return new self(sprintf('The account of username "%s" has expired', $username));
    }

    public static function becauseIncorrectPasswordWasProvided(): self
    {
        return new self();
    }
}
