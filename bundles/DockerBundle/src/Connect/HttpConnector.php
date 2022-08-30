<?php

namespace DeLaParra\DockerBundle\Connect;

use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\ServerException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpConnector implements ConnectorInterface
{

    private HttpClientInterface $client;
    private array $connection;

    public function __construct(array $connection)
    {
        $this->client = HttpClient::create();
        $this->connection = $connection;
    }

    public function get(string $path): array
    {
        return $this->request('GET', $path);
    }

    public function getVerion()
    {
        // TODO: Implement getVerion() method.
    }

    public function getInfo()
    {
        // TODO: Implement getInfo() method.
    }

    public function post(string $path, array $data)
    {
        return $this->request('POST', $path);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    private function request(string $method, string $path)
    {
        try {
            return $this->client->request($method, $this->getBasePath() . $path)->toArray();
        } catch (ClientException $exception) {
            $message = $exception->getResponse()->toArray();
        } catch (ServerException $exception) {
            dd($exception->getMessage());
        } catch (TransportExceptionInterface $exception) {
            dd($exception->getMessage());
        }
    }

    private function getBasePath(): string
    {
        return 'http://' . $this->connection['host'] . ':' . $this->connection['port'] . '/v' . $this->connection['version'] . '/';
    }
}