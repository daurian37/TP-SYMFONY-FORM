<?php

namespace App\Controller;

use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Sodium\add;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(EntityManagerInterface $em, ManagerRegistry $registry, Request $request): Response
    {
        $student = new Student();
        $form = $this->createFormBuilder($student)

            ->
            add('name', TextType::class, [
                'attr' => [
                    'placeholder' => "Nom de l'étudiant",
                    'class' => 'form-control'
                ]
            ])
                ->add('lastname', TextType::class, [
                    'attr' => [
                        'placeholder' => "Prénom de l'étudiant",
                        'class' => 'form-control'
                    ]
                ])
                ->add('email', EmailType::class, [
                    'attr' => [
                        'placeholder' => "Email de l'étudiant",
                        'class' => 'form-control'
                    ]
                ])
                ->add('password', PasswordType::class, [
                    'attr' => [
                        'placeholder' => "Préom de l'étudiante",
                        'class' => 'form-control'
                    ]
                ])
                ->add('matricule', TextType::class, [
                    'attr' => [
                        'placeholder' => "Prénom de l'étudiant",
                        'class' => 'form-control'
                    ]
                ])
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

        $data = $form->getData();

        $em= $registry->getManager();
            $em->persist($student);
            $em->flush();

        }

        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
            'form' => $form->createView(),
        ]);
    }
}
