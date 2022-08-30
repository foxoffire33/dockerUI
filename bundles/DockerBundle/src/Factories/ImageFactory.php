<?php

namespace DeLaParra\DockerBundle\Factories;

use DeLaParra\DockerBundle\Entity\BuildImage;

final class ImageFactory
{
    private function __construct()
    {}

    public static function pullImage(string $name): BuildImage
    {
        $BuildImage = new BuildImage();
        $BuildImage->setPull($name);
        return $BuildImage;
    }
}