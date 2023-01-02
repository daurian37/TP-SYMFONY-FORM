<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr'=>[
                    'placeholder' => "Nom de l'étudiant",
                    'class' => 'form-control'
                ]
            ])

            ->add('lastname',TextType::class,[
                'attr'=>[
                    'placeholder' => "Prénom de l'étudiant",
                    'class' => 'form-control'
                ]
            ])

            ->add('email',EmailType::class,[
        'attr'=>[
            'placeholder' => "Email de l'étudiant",
            'class' => 'form-control'
        ]
    ])
            ->add('password',PasswordType::class,[
            'attr'=>[
            'placeholder' => "Préom de l'étudiante",
            'class' => 'form-control'
        ]
    ])
            ->add('matricule',TextType::class,[
                'attr'=>[
                    'placeholder' => "Prénom de l'étudiant",
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
