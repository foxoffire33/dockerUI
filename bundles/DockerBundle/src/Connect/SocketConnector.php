<?php

namespace DeLaParra\DockerBundle\Connect;


use DeLaParra\DockerBundle\DependencyInjection\Configuration;
use Symfony\Flex\Configurator\ContainerConfigurator;

class SocketConnector implements ConnectorInterface
{
    private $connection;

    public function __construct(array $connection)
    {
        $this->connection = curl_init();
        curl_setopt($this->connection,CURLOPT_UNIX_SOCKET_PATH, '');
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function getVerion()
    {
        // TODO: Implement getVerion() method.
    }

    public function getInfo()
    {
        // TODO: Implement getInfo() method.
    }

    public function post()
    {
        // TODO: Implement post() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function getClient()
    {
        // TODO: Implement getClient() method.
    }
}