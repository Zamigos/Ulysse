<?php

namespace Ulysse\Business\SaleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SaleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Nom'))
            ->add('stock', null, array('label' => 'Quantité'))
            ->add('price', null, array('label' => 'Prix'))
            ->add('observation', null, array('label' => 'Observation'))
            ->add('shape', null, array('label' => 'Etat de votre produit', 'required' => true))
            ->add('image', new ImageType(), array('label' => false))
            ->add('product', null, array('label' => null))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ulysse\Business\SaleBundle\Entity\Sale'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ulysse_business_salebundle_sale';
    }
}