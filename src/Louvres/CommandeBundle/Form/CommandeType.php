<?php

namespace Louvres\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class CommandeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateVisite', DateType::class, array(
                'widget' =>'single_text',
                'format' => 'dd-MM-yyyy',
                'html5' => false,
                'attr' => array(
                    'class' => 'col-sm-6 col-md-5 col-lg-4',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                )
            ))
            ->add('typeBillet', ChoiceType::class, array(
                'choices' => array(
                    'Journée' => 'journee',
                    'Demi-journée (à partir de 14h)' => 'demi-journee'),
                'multiple' => false,
                'expanded' => true))
        /*    ->add('nbBillet', ChoiceType::class, array(
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    )))*/
            ->add('billets', CollectionType::class, array(
                'entry_type'    => BilletType::class,
                'allow_add' => true,
                'by_reference' => false
            ))
            ->add('valider', SubmitType::class, array(
                'attr' => array('class' => 'valider')))
        /*    ->add('prixTotal')*/
         /*   ->add('mail')*/
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvres\CommandeBundle\Entity\Commande'
        ));
    }
}
