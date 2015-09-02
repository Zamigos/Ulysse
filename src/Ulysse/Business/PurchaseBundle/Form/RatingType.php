<?php

namespace Ulysse\Business\PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RatingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Titre'))
            ->add('content', null, array('label' => 'Contenu'))
            ->add('rate', null, array('label' => 'Note (0 à 5)'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                                   'data_class' => 'Ulysse\Business\PurchaseBundle\Entity\Rating'
                               ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ulysse_business_purchasebundle_rating';
    }
}
