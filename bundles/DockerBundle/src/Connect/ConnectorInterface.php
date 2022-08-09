<?php

namespace DeLaParra\DockerBundle\Connect;

interface ConnectorInterface
{
    public function getClient();

    public function get();

    public function getVerion();

    public function getInfo();

    public function post();

    public function delete();
}