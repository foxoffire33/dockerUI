<?php

namespace DeLaParra\DockerBundle\Connect;


use DeLaParra\DockerBundle\DependencyInjection\Configuration;
use const http\Client\Curl\Versions\CURL;

class HttpConnector implements ConnectorInterface
{

    private $connection;

    public function __construct(array $connection)
    {
        var_dump($connection);
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