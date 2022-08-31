<?php

namespace App\Controller;

use App\Form\PullImageFormType;
use App\Form\PullImageType;
use DeLaParra\DockerBundle\Entity\BuildImage;
use DeLaParra\DockerBundle\Entity\CreateImage;
use DeLaParra\DockerBundle\Services\ImageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{

    #[Route('/image',
        name: 'images_all',
        methods: ['GET'])
    ]
    public function index(ImageService $service)
    {
        $content = $this->renderView('images/index.html.twig', [
            'images' => $service->all()
        ]);

        return new Response($content, 200);
    }

    #[Route('/container/create',
        name: 'container_create',
        methods: ['GET'],
    )]
    public function create(): string
    {
        return $this->renderView('', []);
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

//    #[Route('images/pull', name: 'images_pull', methods: ['POST'])]
//    public function pull(Request $request, ImageService $imageService): JsonResponse
//    {
//        $imageName = $request->request->get('name');
//        return new JsonResponse($imageService->pull($imageName), 200);
//    }

    #[Route('images/pull', name: 'images_pull', methods: ['GET','POST'])]
    public function createPullRequest(Request $request, EntityManagerInterface $entityManager, ImageService $imageService): Response
    {
        $createImage = new CreateImage();
        $form = $this->createForm(PullImageFormType::class, $createImage);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){



            $result = $imageService->pull($createImage->getFromImage());
            dd($result);

           // $entityManager->persist($buildImage);
          //  $entityManager->flush();

            return $this->redirectToRoute('images');
        }

        return $this->render('images/pull_form.html.twig', [
            'createImageForm' => $form->createView(),
        ]);
    }

}