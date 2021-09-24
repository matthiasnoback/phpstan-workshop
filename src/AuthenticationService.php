<?php

declare(strict_types=1);

namespace Demo;

use DateTimeImmutable;

final class AuthenticationService
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    public function authenticate(string $username, string $password): void
    {
        $user = $this->repository->findByUsername($username);

        if (! $user->isPasswordCorrect($password)) {
            throw CouldNotAuthenticate::becauseIncorrectPasswordWasProvided();
        }

        if ($user->isAccountExpired(new DateTimeImmutable())) {
            throw CouldNotAuthenticate::becauseAccountIsExpired();
        }
    }
}
