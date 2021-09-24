<?php

declare(strict_types=1);

namespace Demo;

use DateTimeImmutable;

final class User
{
    private function __construct(
        private string $username,
        private string $hashedPassword,
        private ?DateTimeImmutable $expiryDate
    ) {
    }

    public static function fromDatabaseRecord(array $record): self
    {
        return new self(
            $record['username'],
            $record['password'],
            DateTimeImmutable::createFromFormat('Y-m-d', $record['expiry_date'])
        );
    }

    public function username(): string
    {
        return $this->username;
    }

    public function isPasswordCorrect(string $password): bool
    {
        return $password === $this->hashedPassword;
    }

    public function isAccountExpired(DateTimeImmutable $currentTime): bool
    {
        return $this->expiryDate < $currentTime;
    }
}
