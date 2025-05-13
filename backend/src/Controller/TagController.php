<?php

namespace App\Controller;

use App\Repository\TagsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class TagController extends AbstractController
{

    public function __construct(private readonly TagsRepository $tagsRepository)
    {
    }

    #[Route('/api/tags', name: 'app_tag')]
    public function index(): JsonResponse
    {
        $tags = $this->tagsRepository->findAll();
        return $this->json($tags, context: ['groups' => ['tags']]);
    }
}
