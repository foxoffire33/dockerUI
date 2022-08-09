<?php

namespace DeLaParra\DockerBundle\Builder;

use DeLaParra\DockerBundle\Entity\Container;
use DeLaParra\DockerBundle\Entity\ExsposedPort;
use DeLaParra\DockerBundle\NetworkProtacols;

class ContainerBuilder
{
    public function __construct(protected Container $container)
    {
    }

    public function addEnvironmentVariable(string $key, string $value): ContainerBuilder
    {
        $this->container->envariament[$key] = $value;
        return $this;
    }

    public function addExsposePort(string $from, string $to, NetworkProtacols $networkProtacol): ContainerBuilder
    {
        $this->container->ExposedPorts[] = new ExsposedPort(22, 22, NetworkProtacols::TCP);
        return $this;
    }

    public function setName(string $name): ContainerBuilder
    {
        $this->container->name = $name;
        return $this;
    }

}