<?php

namespace DeLaParra\DockerBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Authenticate
{
    #[Assert\NotBlank]
    #[Assert\Type(type: 'string')]
    private string $username;

    #[Assert\NotBlank]
    #[Assert\Type(type: 'string')]
    private string $password;

    #[Assert\NotBlank]
    #[Assert\Email]
    private string $email;

    #[Assert\NotBlank]
    #[Assert\Type(type: 'string')]
    private string $serveraddress = 'https://index.docker.io/v1/';
}