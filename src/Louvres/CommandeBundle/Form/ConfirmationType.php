<?php

namespace Louvres\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConfirmationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre email'
                )))
            ->add('moyenPaiement', ChoiceType::class, array('choices' => array(
                'Paypal' => 'paypal',
                'Carte Bleue' => 'stripe'),
                'multiple' => false,
                'expanded' => true))
        ->add('valider', SubmitType::class, array(
        'attr' => array('class' => 'valider')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvres\CommandeBundle\Entity\Confirmation'
        ));
    }
}
