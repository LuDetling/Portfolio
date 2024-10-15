<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ProjectController extends AbstractController
{

    public function __construct(private ProjectRepository $projectRepository) {}

    #[Route('/api/projects', name: 'app_projects', methods: ['GET'])]
    public function getProjects(): JsonResponse
    {
        $projects = $this->projectRepository->findAll();
        return $this->json($projects, context: ['groups' => ['projets']]);
    }

    #[Route('/api/project/{id}', name: 'app_project', methods: ['GET'])]
    public function getProject(int $id): JsonResponse
    {
        $project = $this->projectRepository->find($id);
        return $this->json($project);
    }
}
