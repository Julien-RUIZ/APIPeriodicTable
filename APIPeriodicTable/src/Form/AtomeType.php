<?php

namespace App\Form;

use App\Entity\AtomCategory;
use App\Entity\Atome;
use App\Enum\AtomGroup;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AtomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('slug', TextType::class, [
                'help'=>'Sans Majuscule et accent'
            ])
            ->add('infoAtome', TextareaType::class)
            ->add('numero', IntegerType::class, [
                'label'=>'Numéro atomique'
            ])
            ->add('symbole')
            ->add('atomCategory', EntityType::class, [
                'class' => AtomCategory::class,
                'choice_label' => 'name',
                'label' => 'Catégorie d\'atome',
            ])
            ->add('infoGroupe', IntegerType::class, [
                'label'=>'Numéro du groupe'
            ])
            ->add('groupe', ChoiceType::class, [
                'choices'=> array_combine(
                    array_map(fn(AtomGroup $group) => $group->value, AtomGroup::cases()),  // Labels
                    array_map(fn(AtomGroup $group) => $group->name, AtomGroup::cases())   // Valeurs
                ),
            ])
            ->add('infoPeriode', IntegerType::class, [
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
            ->add('is_radioactif')

            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Atome::class,
        ]);
    }
}
