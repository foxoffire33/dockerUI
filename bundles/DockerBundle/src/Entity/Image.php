<?php

namespace DeLaParra\DockerBundle\Entity;

use DeLaParra\DockerBundle\Repository\SocketRepository;
use Symfony\Component\Validator\Constraints as Assert;

class Image
{

    #[Assert\NotBlank]
    #[Assert\Type(type: 'string')]
    private string $id;

    #[Assert\NotBlank]
    #[Assert\Type(type: 'string')]
    private string $parentId;

    #[Assert\NotBlank]
    #[Assert\All([
        new Assert\NotBlank(),
        new Assert\Type(['type' => 'string']),
    ])]
    private array $repoTags = [];

    #[Assert\NotBlank]
    #[Assert\All([
        new Assert\NotBlank(),
        new Assert\Type(['type' => 'string']),
    ])]
    private array $repoDigests = [];

    #[Assert\NotBlank]
    #[Assert\All([
        new Assert\NotBlank(),
        new Assert\Type(['type' => 'string']),
    ])]
    private array $labels = [];

    #[Assert\NotBlank]
    #[Assert\Type(type: 'int')]
    private int $created;

    #[Assert\NotBlank]
    #[Assert\Type(type: 'int')]
    private int $size;

    #[Assert\NotBlank]
    #[Assert\Type(type: 'int')]
    private int $virtualSize;

    #[Assert\NotBlank]
    #[Assert\Type(type: 'int')]
    private int $sharedSize;

    #[Assert\Type(type: 'int')]
    private int $containers;

}