<?php

namespace App\Controller;

use App\Entity\Tags;
use App\Form\TagsForm;
use App\Repository\TagsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class TagController extends AbstractController
{

    public function __construct(private TagsRepository $tagsRepository, private EntityManagerInterface $em)
    {
    }

    #[Route('/api/tags', name: 'api_tag')]
    public function index(): JsonResponse
    {
        $tags = $this->tagsRepository->findAll();
        return $this->json($tags, context: ['groups' => ['tags']]);
    }

    #[Route('/api/tags/{id}', name: 'api_tag_show', methods: ['GET'])]
    public function showTag(Tags $tag): JsonResponse
    {
        return $this->json($tag, context: ['groups' => ['tags']]);
    }

    #[Route('/api/tags/create', name: 'api_tag_create', methods: ['POST'])]
    public function createTag(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $tag = new Tags();

        $form = $this->createForm(TagsForm::class, $tag);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($tag);
            $this->em->flush();
            return $this->json($tag, 201, [], ['groups' => ['tags']]);
        }
        return $this->json([
            'status' => 'error',
            'message' => 'Invalid data',
            'errors' => $form->getErrors(true, false)
        ], 400);
    }

    #[Route('/api/tags/{id}', name: 'api_tag_update', methods: ['PUT'])]
    public function updateTag(Request $request, Tags $tag): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(TagsForm::class, $tag);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->json($tag, 200, [], ['groups' => ['tags']]);
        }
        return $this->json([
            'status' => 'error',
            'message' => 'Invalid data',
            'errors' => $form->getErrors(true, false)
        ], 400);
    }

    #[Route('/api/tags/{id}', name: 'api_tag_delete', methods: ['DELETE'])]
    public function deleteTag(Tags $tag): JsonResponse
    {
        $this->em->remove($tag);
        $this->em->flush();
        return $this->json(['status' => 'success', 'message' => 'Tag deleted'], 204);
    }
}
