<?php

namespace Ulysse\Business\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraint = new UserPassword();

        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('firstname', null, array('label' => 'Prénom'))
            ->add('lastname', null, array('label' => 'Nom'))
            ->add('address', null, array('label' => 'Adresse'))
            ->add('cp', null, array('label' => 'Code postal'))
            ->add('city', null, array('label' => 'Ville'))
            ->add('country', null, array('label' => 'Pays'))
            ->add('phone', null, array('label' => 'Téléphone'))
            ->add('bio', null, array('label' => 'Biographie'))
        ;

        $builder->add('current_password', 'password', array(
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => $constraint,
        ));

    }

    public function getName()
    {
        return 'ulysse_user_profile';
    }
}