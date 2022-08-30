<?php

namespace DeLaParra\DockerBundle\Services;

use DeLaParra\DockerBundle\DependencyInjection\Configuration;
use DeLaParra\DockerBundle\Entity\Image;

class ContainerService
{
    private function __construct(Configuration $configuration)
    {

    }

    public static function createPullRequest($name)
    {
        $image = new Image();
    }
}