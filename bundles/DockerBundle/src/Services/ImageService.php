<?php

namespace DeLaParra\DockerBundle\Services;

use DeLaParra\DockerBundle\Connect\ConnectorInterface;
use DeLaParra\DockerBundle\DependencyInjection\Configuration;
use DeLaParra\DockerBundle\DockerBundle;
use DeLaParra\DockerBundle\Entity\BuildImage;
use DeLaParra\DockerBundle\Entity\Image;
use DeLaParra\DockerBundle\Factories\ImageFactory;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ImageService
{

    public function __construct(private readonly ConnectorInterface $connector)
    {
    }

    public function all(): array
    {
        $response = $this->connector->get('/images/json');
        return $response;
    }

    public function pull(string $name): array
    {
        try {
            $image = ImageFactory::pullImage($name);
            //$response = $this->connector->post('images/create', $image);
            return $this->connector->post('/containers/create',[
                "Image" => "php:8.1.0-fpm"
            ]);
        } catch (\JsonException $exception) {
            return [
                'status' => 'error',
                'error' => $exception->getMessage()
            ];
        }
    }
}