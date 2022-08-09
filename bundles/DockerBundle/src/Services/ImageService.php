<?php

namespace DeLaParra\DockerBundle\Services;

use DeLaParra\DockerBundle\DependencyInjection\Configuration;
use DeLaParra\DockerBundle\DockerBundle;

class ImageService
{

    public function __construct(array $connection)
    {
        var_dump($connection);die();
    }
}