<?php

namespace DeLaParra\DockerBundle\Connect;

interface ConnectorInterface
{

    public function get(string $path);

    public function getVerion();

    public function getInfo();

    public function post(string $path, array $data);

    public function delete();
}