<?php

namespace App\Form;

use App\Entity\Atome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('numero')
            ->add('symbole')
            ->add('infoGroupe')
            ->add('infoPeriode')
            ->add('infoBloc')
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
            ->add('famille')
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
