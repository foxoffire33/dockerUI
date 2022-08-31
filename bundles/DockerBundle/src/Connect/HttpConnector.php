<?php

namespace DeLaParra\DockerBundle\Connect;

use DeLaParra\DockerBundle\Factories\ImageFactory;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\ServerException;
use Symfony\Component\HttpClient\Exception\TransportException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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

        return $this->request('POST', $path, $data);

    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    private function request(string $method, string $path, array $data = [])
    {
        $httpClient = HttpClient::create();
        try {
           $response = $httpClient->request($method, $this->getBasePath() . $path,[
               'json' => $data
           ]);
//            $response = $httpClient->request('POST','http://192.168.1.220:2375/containers/create',[
//                'json' => ["Image" => "php:8.1"]
//            ]);
        } catch (ClientException $exception) {
            $message = $exception->getResponse();
            dd((string)$exception->getMessage());
        } catch (ServerException $exception) {
            dd($exception);
        } catch (TransportException $exception) {
            dd($exception->getMessage());
        }catch (BadRequestException $exception){}

        if ($method === 'POST'){
            foreach ($httpClient->stream($response) as $chunk){
                print $chunk->getContent();
            }
        }

        return $response->toArray();
    }

    private function getBasePath(): string
    {
        return 'http://' . $this->connection['host'] . ':' . $this->connection['port'];
    }
}