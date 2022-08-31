<?php

namespace App\Controller;

use DeLaParra\DockerBundle\Services\ContainerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{

    #[Route('/containers',
        name: 'containers_all',
        methods: ['GET'])
    ]
    public function index(ContainerService $service): Response
    {
        return $this->render('containers/index.html.twig', [
            'containers' => $service->getAll()
        ]);
    }

    #[Route('/container/create',
        name: 'container_create',
        methods: ['GET'],
    )]
    public function create(): string
    {


        return $this->renderView('', []);
    }

    #[Route('/container/{id}',
        name: 'container_detail',
        methods: ['get'],
    )]
    public function detail(Request $request, string $id, ContainerService $service)
    {

        dd($service->inspectContainer($id));
    }

    #[Route('/container/{id}/edit',
        name: 'container_save',
        methods: ['POST'],
    )]
    public function save(Request $request)
    {

    }


    #[Route('/container/{id}/edit',
        name: 'container_edit',
        methods: ['GET'],
    )]
    public function edit(string $id): string
    {
        return $this->renderView('', []);
    }

    #[Route('/container/{id}/edit',
        name: 'container_update',
        methods: ['POST', 'PUT'],
    )]
    public function update(Request $request)
    {

    }

    #[Route('container/{id}', methods: ['DELETE'])]
    public function delete(string $id)
    {

    }

    #[Route('container/{id}/start', methods: ['GET'])]
    public function start(string $id)
    {

    }

    #[Route('container/{id}/pause', methods: ['POST'])]
    public function pause(string $id)
    {

    }

    #[Route('container/{id}/resume', methods: ['POST'])]
    public function resume(string $id)
    {

    }

    #[Route('container/{id}/stop', methods: ['POST'])]
    public function stop(string $id)
    {

    }

}