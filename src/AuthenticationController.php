<?php

declare(strict_types=1);

namespace Demo;

use Assert\Assertion;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AuthenticationController
{
    public function __construct(
        private AuthenticationService $authenticationService
    ) {
    }

    public function authenticateAction(ServerRequestInterface $request): ResponseInterface
    {
        $parsedBody = $request->getParsedBody();
        Assertion::isArray($parsedBody);

        $this->authenticationService->authenticate(
            $parsedBody['username'],
            $parsedBody['password']
        );

        return new Response();
    }
}
