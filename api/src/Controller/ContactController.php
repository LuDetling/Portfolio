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

        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $phone = $data['phone'];
        $email = $data['email'];
        $message = $data['message'];
        // $formule = $this->formuleRepository->find($data['formule']);

        // ajouter dans contact dans la bdd
        $contact = (new Contact())
            ->setEmail($data['email'])
            // ->setFormule($formule)
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setPhone($phone)
            ->setMessage($message);
        $this->em->persist($contact);
        $this->em->flush();

        $txt = "
                <html>
                    <head>
                        <title>Portfolio</title>
                    </head>
                    <body>
                        <h1>" . $firstname ." ". $lastname . "</h1>
                        <p>" . $email . "</p>
                        <p>" . $phone . "</p>
                        <p>" . $message . "</p>
                    </body>
                </html>
                ";
                
        //mail
        $email = (new Email())
            ->from("lucas.detling@lucas-detling.com")
            ->to("lucas.detling@lucas-detling.com")
            ->replyTo($data["email"])
            ->subject('Nouveau message de contact')
            ->text(strip_tags($txt))
            ->html($txt);

        $this->mailer->send($email);



        return $this->json('Votre message a bien été envoyé', Response::HTTP_OK);
    }
}
