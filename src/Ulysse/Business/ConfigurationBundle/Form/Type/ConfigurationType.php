<?php

namespace Ulysse\Business\ConfigurationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ConfigurationType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('shopname', null, array('label' => 'Nom de la boutique'))
                ->add('legalNotice', null, array('label' => 'Mentions légales'))
                ->add('logo', new ImageType())

        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $event->getForm()->add('logo', new ImageType(), array('required' => false));
        });
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Ulysse\Business\ConfigurationBundle\Entity\Configuration'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'configuration_form';
    }

}
