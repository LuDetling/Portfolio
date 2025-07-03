<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\ProjectImage;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
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

    #[Route('/api/projects', name: 'api_projects', methods: ['GET'])]
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

    #[Route('/api/project/{id}', name: 'api_project', methods: ['GET'])]
    public function getProject(int $id): JsonResponse
    {
        $project = $this->projectRepository->find($id);
        return $this->json($project, context: ['groups' => ['projets']]);
    }

    #[Route('/api/project/create', name: 'api_project_create', methods: ['POST'])]
    public function createProject(Request $request): JsonResponse
    {

        $picture = $request->files->get('picture');
        $title = $request->request->get('title');
        $description = $request->request->get('description');
        $shortDescription = $request->request->get('shortDescription');
        $link = $request->request->get('link');
        $tags = json_decode($request->request->get('tags'), true);
        $imagesFile = $request->files->get('images');


        $filesystem = new Filesystem();
        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/projects';

        if (!$filesystem->exists($uploadDir)) {
            $filesystem->mkdir($uploadDir, 0755);
        }

        $pictureName = uniqid() . '.' . $picture->guessExtension();
        $project = new Project();

        $images = [];
        foreach ($imagesFile as $imageFile) {
            $imageName = uniqid() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadDir, $imageName);

            $image = new ProjectImage();
            $image->setPath($imageName);
            $image->setProject($project);
            $this->entityManager->persist($image);
            $images[] = $image;
        }


        $form = $this->createForm(ProjectType::class, $project);
        $form->submit([
            'title' => $title,
            'description' => $description,
            'shortDescription' => $shortDescription,
            'picture' => $pictureName,
            'images' => $images,
            'link' => $link,
            'tags' => $tags
        ]);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->json([
                'errors' => (string) $form->getErrors(true, false),
            ], 400);
        }
        $picture->move($uploadDir, $pictureName);
        $this->entityManager->persist($project);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'Project created successfully',
            'code' => 201,
        ], 201);
    }

    #[Route('/api/project/{id}', name: 'api_project_delete', methods: ['DELETE'])]
    public function deleteProject(int $id): JsonResponse
    {
        $project = $this->projectRepository->find($id);
        if (!$project) {
            return $this->json(['message' => 'Project not found'], 404);
        }

        $filesystem = new Filesystem();
        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/projects';
        $filesystem->remove($uploadDir . '/' . $project->getPicture());

        $this->entityManager->remove($project);
        $this->entityManager->flush();

        return $this->json(['message' => 'Project deleted successfully'], 200);
    }

    #[Route('/api/project/{id}', name: 'api_project_update', methods: ['POST'])]
    public function updateProject(Request $request, int $id): JsonResponse
    {
        $project = $this->projectRepository->find($id);
        if (!$project) {
            return $this->json(['message' => 'Project not found'], 404);
        }

        $picture = $request->files->get('picture');
        $title = $request->request->get('title');
        $description = $request->request->get('description');
        $shortDescription = $request->request->get('shortDescription');
        $link = $request->request->get('link');
        $tags = json_decode($request->request->get('tags'), true);
        $pictureName = $project->getPicture();

        if ($picture) {
            $filesystem = new Filesystem();
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/projects';

            if (!$filesystem->exists($uploadDir)) {
                $filesystem->mkdir($uploadDir, 0755);
            }

            $filesystem->remove($uploadDir . '/' . $project->getPicture());
            $pictureName = uniqid() . '.' . $picture->guessExtension();
            $picture->move($uploadDir, $pictureName);
            $project->setPicture($pictureName);
        }


        $form = $this->createForm(ProjectType::class, $project);
        $form->submit([
            'title' => $title,
            'description' => $description,
            'shortDescription' => $shortDescription,
            'tags' => $tags,
            'link' => $link,
            'picture' => $pictureName
        ]);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->json([
                'errors' => (string) $form->getErrors(true, false),
            ], 400);
        }

        $this->entityManager->flush();

        return $this->json([
            'message' => 'Project updated successfully',
            'code' => 200,
        ], 200);
    }
}
