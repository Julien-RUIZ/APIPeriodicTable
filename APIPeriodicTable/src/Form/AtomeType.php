<?php

namespace App\Form;

use App\Entity\Atome;

use App\Enum\AtomFamily;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AtomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('slug')
            ->add('electron')
            ->add('numero', IntegerType::class, [
                'disabled'=>true
            ])
            ->add('symbole')
            ->add('infoGroupe', IntegerType::class, [
                'disabled'=>true
            ])
            ->add('infoPeriode', IntegerType::class, [
                'disabled'=>true
            ])
            ->add('masseVolumique')
            ->add('cas')
            ->add('einecs')
            ->add('masseAtomique')
            ->add('rayonAtomique')
            ->add('rayonDeCovalence')
            ->add('rayonDeVanDerWaals')
            ->add('configurationElectronique')
            ->add('etatOxydation')
            ->add('decouverteAnnee')
            ->add('decouverteNoms')
            ->add('decouvertePays')
            ->add('electronegativite')
            ->add('pointDeFusion')
            ->add('pointDEbullition')
            ->add('is_radioactif')
            ->add('famille', ChoiceType::class, [
                'choices' => array_combine(
                    array_map(fn(AtomFamily $family) => $family->value, AtomFamily::cases()),  // Labels
                    array_map(fn(AtomFamily $family) => $family->name, AtomFamily::cases())   // Valeurs
                ),
                'expanded' => false,  // Liste déroulante (dropdown)
                'multiple' => false,  // Choix unique
            ])
            ->add('infoAtome')
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
