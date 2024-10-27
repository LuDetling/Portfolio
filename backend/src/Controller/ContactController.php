<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Formule;
use App\Repository\FormuleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactController extends AbstractController
{

    public function __construct(
        private MailerInterface $mailer,
        private EntityManagerInterface $em,
        private FormuleRepository $formuleRepository
    ) {
    }

    #[Route('/api/contact', name: 'contact', methods: ['POST'])]
    public function index(Request $request, ValidatorInterface $validator): JsonResponse
    {

        $data = json_decode($request->getContent(), true);

        $errors = $validator->validate($data);

        if (count($errors) > 0) {
            return $this->json(['Erreur dans le formulaire'] + $errors, Response::HTTP_BAD_REQUEST);
        }

        $email = (new Email())
            ->from($data['email'])
            ->to('lucas.detling@gmail.com')
            ->subject('Nouveau message de contact')
            ->text($data['message']);

        $this->mailer->send($email);

        $formule = $this->formuleRepository->find($data['formule']);

        // ajouter dans contact
        $contact = (new Contact())
            ->setEmail($data['email'])
            ->setFormule($formule)
            ->setMessage($data['message']);
        $this->em->persist($contact);
        $this->em->flush();

        return $this->json('Votre message a bien été envoyé', Response::HTTP_OK);
    }
}
