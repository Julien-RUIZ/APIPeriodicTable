<?php

namespace App\Form;

use App\Entity\ElementCategory;
use App\Entity\Element;
use App\Entity\ElementGroupe;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('slug', TextType::class, [
                'help'=>'Sans Majuscule et accent'
            ])
            ->add('infoElement', TextareaType::class)
            ->add('numero', IntegerType::class, [
                'label'=>'Numéro atomique'
            ])
            ->add('symbole', TextType::class,[
                'attr' => [
                    'maxlength' => 10,  // Limite de caractères
                ]
            ])
            ->add('elementCategory', EntityType::class, [
                'class' => ElementCategory::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
            ])
            ->add('elementGroupe', EntityType::class, [
                'class' => ElementGroupe::class,
                'choice_label' => function (ElementGroupe $elementGroupe) {
                    return $elementGroupe->getName() . ' ( Numéro du groupe : ' . $elementGroupe->getId() . ')';
                },
            ])
            ->add('infoGroupe', IntegerType::class, [
                'help'=>'Récupérer le numéro du groupe sur le champ précédant',
                'label'=>'Numéro du groupe (Ligne verticale)',
                'attr' => [
                    'max' => 10,  // Remplacez 100 par la valeur maximale souhaitée
                ],
            ])
            ->add('infoPeriode', IntegerType::class, [
                'label'=>'Numéro de la période (Ligne horizontale)',
                'attr' => [
                    'max' => 7,  // Remplacez 100 par la valeur maximale souhaitée
                ],
            ])
            ->add('masseVolumique', TextType::class, [
                'attr' => [
                    'placeholder' => 'exemple : 00,000 g·cm-3 (00 °C)',
                    'maxlength' => 100,  // Limite de caractères
                ]
            ])
            ->add('cas', TextType::class,[
                'attr' => [
                    'placeholder' => 'exemple : 00000-00-0',
                    'maxlength' => 50,  // Limite de caractères
                ]
            ])
            ->add('einecs', TextType::class,[
                'attr' => [
                    'placeholder' => 'exemple : 000-000-0',
                    'maxlength' => 50,  // Limite de caractères
                ]
            ])
            ->add('masseAtomique', IntegerType::class,[
                'attr' => [
                    'placeholder' => 'exemple : 0.00000',
                    'min' => 0,
                ]
            ])
            ->add('rayonAtomique', TextType::class,[
                'attr' => [
                    'placeholder' => 'exemple : 000 pm (000 pm)',
                    'maxlength' => 50,  // Limite de caractères
                ]
            ])
            ->add('rayonDeCovalence', TextType::class,[
                'attr' => [
                    'placeholder' => 'exemple : 000 pm',
                    'maxlength' => 20,  // Limite de caractères
                ]
            ])
            ->add('rayonDeVanDerWaals', TextType::class,[
                'attr' => [
                    'placeholder' => 'exemple : 000 pm',
                    'maxlength' => 20,  // Limite de caractères
                ]
            ])
            ->add('electron', TextType::class, [
                'attr' => [
                    'placeholder' => 'exemple : 2|8|18|32|18|8|18|16|2',
                    'maxlength' => 40,  // Limite de caractères
                ]
            ])
            ->add('configurationElectronique', TextType::class, [
                'attr' => [
                    'placeholder' => 'exemple : [AA] 0f° 0d° 0s°',
                    'maxlength' => 50,  // Limite de caractères
                ]
            ])
            ->add('etatOxydation', TextType::class, [
                'attr' => [
                    'placeholder' => 'exemple : +A, +B, +C, +D',
                    'maxlength' => 20,  // Limite de caractères
                ]
            ])
            ->add('decouverteAnnee', TextType::class, [
                'attr' => [
                    'maxlength' => 20,  // Limite de caractères
                ]
            ])
            ->add('decouverteNoms', TextType::class, [
                'attr' => [
                    'maxlength' => 255,  // Limite de caractères
                ]
            ])
            ->add('decouvertePays', TextType::class, [
                'attr' => [
                    'maxlength' => 255,  // Limite de caractères
                ]
            ])
            ->add('electronegativite', IntegerType::class,[
                'attr' => [
                    'min' => 0,
                ]
            ])
            ->add('pointDeFusion', TextType::class, [
                'attr' => [
                    'placeholder' => 'exemple : -+000,00 °C',
                    'maxlength' => 20,  // Limite de caractères
                ]
            ])
            ->add('pointDEbullition', TextType::class, [
                'attr' => [
                    'placeholder' => 'exemple : -+000,00 °C',
                    'maxlength' => 20,  // Limite de caractères
                ]
            ])
            ->add('radioactif', ChoiceType::class, [
                'choices'  => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
            ])

            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Element::class,
        ]);
    }
}
