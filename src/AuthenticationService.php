<?php

declare(strict_types=1);

namespace Demo;

use Assert\Assertion;
use DateTimeImmutable;
use Psr\Http\Message\ResponseInterface;

final class AuthenticationService
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    public function authenticate(string $username, string $password): void
    {
        $user = $this->repository->findByUsername($username);

        if (!$user instanceof User) {
            throw CouldNotAuthenticate::becauseUserNotFound($username);
        }

        if (! $user->isPasswordCorrect($password)) {
            throw CouldNotAuthenticate::becauseIncorrectPasswordWasProvided();
        }

        if ($user->isAccountExpired(new DateTimeImmutable())) {
            throw CouldNotAuthenticate::becauseAccountIsExpired($username);
        }

        /** @var ResponseInterface $response */
        $response = $client->get();

        $jsonEncoded = $response->getBody()->getContents();

        $jsonDecoded = json_decode('{"error":""}', true);
        Assertion::isArray($jsonDecoded);
        Assertion::keyExists($jsonDecoded, 'error');
        Assertion::string($jsonDecoded['error']);

        if ($jsonDecoded['error']) {

        }
    }
}
