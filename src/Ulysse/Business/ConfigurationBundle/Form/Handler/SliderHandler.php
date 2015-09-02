<?php

namespace Ulysse\Business\ConfigurationBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class SliderHandler
{

    private $form;
    private $request;
    private $em;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    public function process()
    {
        $this->form->add('btn', 'submit', array('label' => 'Valider'));
        
        $this->onUpdate();

        $this->form->handleRequest($this->request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->onSuccess();
            return true;
        }
        return false;
    }

    public function onSuccess()
    {
        $this->em->persist($this->form->getData());
        $this->em->flush();
    }

    public function onUpdate()
    {
        if($id = $this->request->get('id')) {

            $this->form->add('btn', 'submit', array('label' => 'Valider'));

            $repo = $this->em->getRepository('UlysseBusinessConfigurationBundle:Slider');
            $entity = $repo->find($id);

            if(!$entity) {
                throw new EntityNotFoundException();
            }

            $this->getForm()->setData($entity);
        }
    }
}
