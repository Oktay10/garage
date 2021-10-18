<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', ChoiceType::class, [
                'label' => 'Marque',
                'choices' => [
                    'Audi' => 'Audi',
                    'BMW' => 'BMW',
                    'Mercedes' => 'Mercedes',
                    'Volkswagen' => 'Volkswagen',
                    'Seat' => 'Seat'
                ]
            ])
            ->add('modele')
            ->add('categorie')
            ->add('typeVehicule', ChoiceType::class, [
                'label' => 'Carburant',
                'choices' => [
                    'Diesel' => 'Diesel',
                    'Essence' => 'Essence',
                    'Hybride' => 'Hybride'
                ]
            ])
            ->add('color')
            ->add('city')
            ->add('prix', IntegerType::class, [
                'label' => 'Prix_max'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
}
