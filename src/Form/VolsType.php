<?php

namespace App\Form;

use App\Entity\Villes;
use App\Entity\Vols;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numVol')
            ->add('horaireDepart', null, [
                'widget' => 'single_text',
            ])
            ->add('horaireArrivee', null, [
                'widget' => 'single_text',
            ])
            ->add('Prix')
            ->add('reduction')
            ->add('Places')
            ->add('villeDepart', EntityType::class, [
                'class' => Villes::class,
                'choice_label' => 'nom',
            ])
            ->add('villeArrivee', EntityType::class, [
                'class' => Villes::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vols::class,
        ]);
    }
}
