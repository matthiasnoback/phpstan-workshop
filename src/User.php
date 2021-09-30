<?php

declare(strict_types=1);

namespace Demo;

use Assert\Assertion;
use DateTimeImmutable;

final class User
{
    private function __construct(
        private string $username,
        private string $hashedPassword,
        private ?DateTimeImmutable $expiryDate
    ) {
    }

    /**
     * @param array<string,string|null> $record
     */
    public static function fromDatabaseRecord(array $record): self
    {
        $expiryDate = $record['expiry_date'];
        if ($expiryDate !== null) {
            $expiryDate = DateTimeImmutable::createFromFormat('Y-m-d', $expiryDate);
            Assertion::isInstanceOf($expiryDate, DateTimeImmutable::class);
        }

        Assertion::notNull($record['username']);
        Assertion::notNull($record['password']);

        return new self(
            $record['username'],
            $record['password'],
            $expiryDate
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
