<?php

namespace Ulysse\Business\SupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, array('label' => 'Titre'))
                ->add('content', null, array('label' => 'Contenu'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Ulysse\Business\SupportBundle\Entity\Ticket'
            ));
    }

    public function getName()
    {
        return 'ulysse_business_support_bundle_ticket_form';
    }
}
