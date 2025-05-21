<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProjectController extends AbstractController
{

    public function __construct(
        private ProjectRepository $projectRepository,
        private EntityManagerInterface $entityManager,
        private SerializerInterface $serializer
    ) {
    }

    #[Route('/api/projects', name: 'app_projects', methods: ['GET'])]
    public function getProjects(Request $request): JsonResponse
    {
        $page = $request->query->getInt('page', 1);
        $total = $this->projectRepository->count();


        $projects = $this->projectRepository->findBy(
            [],
            ['id' => 'DESC'],
            6,
            ($page - 1) * 6
        );

        return $this->json(data: [
            'projects' => $projects,
            'total' => $total,
            'pages' => ceil($total / 6),
        ], context: ['groups' => ['projets']]);
    }

    #[Route('/api/project/{id}', name: 'app_project', methods: ['GET'])]
    public function getProject(int $id): JsonResponse
    {
        $project = $this->projectRepository->find($id);
        return $this->json($project, context: ['groups' => ['projets']]);
    }

    #[Route('api/project/create', name: 'app_project_create', methods: ['POST'])]
    public function createProject(Request $request): JsonResponse
    {

        $data = json_decode($request->getContent(), true);
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->submit($data);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse([
                'errors' => (string) $form->getErrors(true, false),
            ], 400);
        }

        $this->entityManager->persist($project);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'Project created successfully',
            'code' => 201,
        ], 201);
    }
}
