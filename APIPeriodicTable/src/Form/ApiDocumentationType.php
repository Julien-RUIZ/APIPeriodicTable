<?php

namespace App\Form;

use App\Entity\ApiDocumentation;
use Doctrine\DBAL\Types\JsonType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApiDocumentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title', TextType::class,[
                'label'=>'Titre'
            ])
            ->add('buttonTitle', TextType::class, [
                'label'=>'Titre du bouton'
            ])
            ->add('Description', TextareaType::class)

            ->add('Endpoint1', TextareaType::class, [
                'required'=>false,
            ])
            ->add('Endpoint2', TextareaType::class, [
                'required'=>false,
            ])
            ->add('Endpoint3', TextareaType::class, [
                'required'=>false,
            ])
            ->add('Endpoint4', TextareaType::class, [
                'required'=>false,
            ])
            ->add('ExampleRequest1', TextareaType::class, [
                'required'=>false,
                'label'=>'Exemple de requête 1'
            ])
            ->add('ExampleRequest2', TextareaType::class, [
                'required'=>false,
                'label'=>'Exemple de requête 2'
            ])
            ->add('ExampleRequest3', TextareaType::class, [
                'required'=>false,
                'label'=>'Exemple de requête 3'
            ])
            ->add('ExampleRequest4', TextareaType::class, [
                'required'=>false,
                'label'=>'Exemple de requête 4'
            ])
            ->add('Error', TextareaType::class, [
                'required'=>false,
                'label'=>'Gestion des erreurs'
            ])
            ->add('ExampleResponse', TextareaType::class, [
                'required'=>false,
                'label'=>'Exemple de réponse'
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApiDocumentation::class,
        ]);
    }
}
