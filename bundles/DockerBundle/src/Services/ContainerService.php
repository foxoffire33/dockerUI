<?php

namespace DeLaParra\DockerBundle\Services;

use DeLaParra\DockerBundle\Connect\ConnectorInterface;
use DeLaParra\DockerBundle\DependencyInjection\Configuration;
use DeLaParra\DockerBundle\Entity\Image;
use DeLaParra\DockerBundle\Factories\ImageFactory;

class ContainerService
{
    public function __construct(private readonly ConnectorInterface $connector)
    {
    }

    public function getAll()
    {
        return $this->connector->get('/containers/json?all=1');
    }

    public function inspectContainer($id)
    {
        return $this->connector->get('/containers/' . $id . '/json');
    }

    public function create(string $name): array
    {
        return $this->connector->post('/containers/create', [
            "Image" => "php:8.1"
        ]);
    }
}