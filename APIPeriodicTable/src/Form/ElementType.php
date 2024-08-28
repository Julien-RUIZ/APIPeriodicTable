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
            ->add('symbole')
            ->add('atomCategory', EntityType::class, [
                'class' => ElementCategory::class,
                'choice_label' => 'name',
                'label' => 'Catégorie d\'atome',
            ])
            ->add('atomGroupe', EntityType::class, [
                'class' => ElementGroupe::class,
                'choice_label' => 'name',
                'label' => 'Groupe d\'atome',
            ])
            ->add('infoGroupe', IntegerType::class, [
                'label'=>'Numéro du groupe (Ligne verticale)'
            ])
            ->add('infoPeriode', IntegerType::class, [
                'label'=>'Numéro de la période (Ligne horizontale)'
            ])
            ->add('masseVolumique')
            ->add('cas')
            ->add('einecs')
            ->add('masseAtomique')
            ->add('rayonAtomique')
            ->add('rayonDeCovalence')
            ->add('rayonDeVanDerWaals')
            ->add('electron')
            ->add('configurationElectronique')
            ->add('etatOxydation')
            ->add('decouverteAnnee')
            ->add('decouverteNoms')
            ->add('decouvertePays')
            ->add('electronegativite')
            ->add('pointDeFusion')
            ->add('pointDEbullition')
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
