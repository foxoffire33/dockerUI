<?php

namespace DeLaParra\DockerBundle\Services;

use DeLaParra\DockerBundle\Connect\ConnectorInterface;

class AuthenticateService
{

    public function __construct(private readonly ConnectorInterface $connector)
    {}

    public function login(): array
    {
        return [];
    }

    public function logout(): array
    {
        return [];
    }
}