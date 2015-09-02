<?php

namespace Ulysse\Business\SupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResponseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', null, array('label' => 'Répondre'))
            ->add('ticket', null, array('label' => false, 'attr' => array('class' => 'hidden')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ulysse\Business\SupportBundle\Entity\Response'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ulysse_business_supportbundle_response';
    }
}
