<?php

namespace Louvres\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\CountryTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BilletType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reduit', CheckboxType::class, array(
                'label' => 'Tarif réduit (étudiant, employé du musée, d’un service du Ministère de la Culture, militaire…)',
                'required' => false,
                 ))
            ->add('nom', TextType::class, array(
                'attr' => array(
                'placeholder' => 'Nom'
                ))
            )
            ->add('prenom', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Prénom'
                    ))
            )
            ->add('pays', CountryType::class)

            ->add('dateNaissance', DateType::class, array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                'attr' => array(
                    'placeholder' => 'Date de naissance'
                ))
        );
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvres\CommandeBundle\Entity\Billet'
        ));
    }
}
