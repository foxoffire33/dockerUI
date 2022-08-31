<?php

namespace DeLaParra\DockerBundle\Factories;

use DeLaParra\DockerBundle\Entity\BuildImage;
use DeLaParra\DockerBundle\Entity\CreateImage;

final class ImageFactory
{
    private function __construct()
    {}

    public static function pullImage(string $name): CreateImage
    {
        $BuildImage = new CreateImage();
        $BuildImage->setFromImage($name);
        return $BuildImage;
    }
}