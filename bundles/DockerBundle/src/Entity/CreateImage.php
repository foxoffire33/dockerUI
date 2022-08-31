<?php

namespace DeLaParra\DockerBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class CreateImage
{
    /**
     * Name of the image to pull.
     * The name may include a tag or digest.
     * This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
     * @var string|null
     */
    private ?string $fromImage;

    /**
     * Source to import. T
     * he value may be a URL from which the image can be retrieved or - to read the image from the request body.
     * This parameter may only be used when importing an image.
     * @var string|null
     */
    private ?string $fromSrc;

    /**
     * Repository name given to an image when it is imported.
     * The repo may include a tag. This parameter may only be used when importing an image.
     * @var string|null
     */
    private ?string $repo;

    /**
     * Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
     * @var string|null
     */
    private ?string $tag;

    /**
     * Set commit message for imported image.
     * @var string|null
     */
    private ?string $message;

    /**
     * Apply Dockerfile instructions to the image that is created, for example: changes=ENV DEBUG=true. Note that ENV DEBUG=true should be URI component encoded.
     * Supported Dockerfile instructions: CMD|ENTRYPOINT|ENV|EXPOSE|ONBUILD|USER|VOLUME|WORKDIR
     * @var array|null
     */
    private ?array $changes;

    /**
     * Platform in the format os[/arch[/variant]]
     * @var string
     */
    private string $platform = '';

    /**
     * @return string|null
     */
    public function getFromImage(): ?string
    {
        return $this->fromImage;
    }

    /**
     * @param string|null $fromImage
     */
    public function setFromImage(?string $fromImage): void
    {
        $this->fromImage = $fromImage;
    }

    /**
     * @return string|null
     */
    public function getFromSrc(): ?string
    {
        return $this->fromSrc;
    }

    /**
     * @param string|null $fromSrc
     */
    public function setFromSrc(?string $fromSrc): void
    {
        $this->fromSrc = $fromSrc;
    }

    /**
     * @return string|null
     */
    public function getRepo(): ?string
    {
        return $this->repo;
    }

    /**
     * @param string|null $repo
     */
    public function setRepo(?string $repo): void
    {
        $this->repo = $repo;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string|null $tag
     */
    public function setTag(?string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array|null
     */
    public function getChanges(): ?array
    {
        return $this->changes;
    }

    /**
     * @param array|null $changes
     */
    public function setChanges(?array $changes): void
    {
        $this->changes = $changes;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform): void
    {
        $this->platform = $platform;
    }


}