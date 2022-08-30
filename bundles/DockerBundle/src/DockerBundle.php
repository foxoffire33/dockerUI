<?php

namespace DeLaParra\DockerBundle;

use DeLaParra\DockerBundle\Connect\HttpConnector;
use DeLaParra\DockerBundle\Connect\SocketConnector;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DockerBundle extends Bundle
{

    /**
     * Dynmapicly load connector class
     * @return void
     */
    public function boot(){
        $driver = $this->container->getParameter('docker.driver');
        if($driver === 'http'){
            $connection = $this->container->getParameter('docker.http_connection');
            $connection['version'] = $this->container->getParameter('docker.APIVersion');
            $connectionClass = new HttpConnector($connection);
        }else{
            $connection = $this->container->getParameter('docker.socket_connection');
            $connection['version'] = $this->container->getParameter('docker.APIVersion');
            $connectionClass = new SocketConnector($connection);
        }

        $this->container->set('docker.connect', $connectionClass);
    }
}