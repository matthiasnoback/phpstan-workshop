<?php

declare(strict_types=1);

namespace Demo;

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
        $this->authenticationService->authenticate(
            $request->getParsedBody()['username'],
            $request->getParsedBody()['password']
        );

        return new Response();
    }
}
