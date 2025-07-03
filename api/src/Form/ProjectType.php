<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\ProjectImage;
use App\Entity\Tags;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('link')
            ->add('picture')
            ->add('images', FileType::class, [
                'label' => 'Images',
                'mapped' => false, // Ne pas le mapper si tu gères le traitement manuellement
                'multiple' => true,
                'required' => false,
            ])
            ->add('description')
            ->add('shortDescription')
            ->add('tags', EntityType::class, [
                'class' => Tags::class,
                'multiple' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
            'csrf_protection' => false,
        ]);
    }
}
