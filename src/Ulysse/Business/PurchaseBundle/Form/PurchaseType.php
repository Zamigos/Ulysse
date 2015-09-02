<?php

namespace Ulysse\Business\PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PurchaseType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array('label' => 'Prénom'))
            ->add('lastname', null, array('label' => 'Nom'))
            ->add('address', null, array('label' => 'Adresse'))
            ->add('cp', null, array('label' => 'Code Postal'))
            ->add('city', null, array('label' => 'Ville'))
            ->add('country', null, array('label' => 'Pays'));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                                   'data_class' => 'Ulysse\Business\PurchaseBundle\Entity\Purchase'
                               ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ulysse_business_purchasebundle_purchase';
    }

}