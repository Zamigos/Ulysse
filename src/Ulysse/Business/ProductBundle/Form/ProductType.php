<?php

namespace Ulysse\Business\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Nom'))
            ->add('description', null, array('label' => 'Description'))
            ->add('category', null, array('label' => 'Catégorie'))
            ->add('image', new ImageType(), array('label' => false))
            ->add('tag', 'collection', array(
                'type'         => new TagType(),
                'allow_add'    => true,
                'allow_delete' => true,
            ), array('label' => 'Tag'))
        ;
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $event->getForm()->add('image', new ImageType(), array('label' => false, 'required' => false));
        });
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ulysse\Business\ProductBundle\Entity\Product',
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ulysse_business_productbundle_product';
    }
}
