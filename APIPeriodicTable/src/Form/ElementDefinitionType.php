<?php

namespace App\Form;

use App\Entity\ElementDefinitions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElementDefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Nom'
            ])
            ->add('namePropertyElement', TextType::class, [
                'label'=>'Nom de la propriété sur la table élément'
            ])
            ->add('definition', TextareaType::class, [
                'label'=>'Définition'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ElementDefinitions::class,
        ]);
    }
}
