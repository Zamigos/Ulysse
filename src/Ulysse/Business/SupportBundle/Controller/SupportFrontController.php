<?php

namespace Ulysse\Business\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ulysse\Business\SupportBundle\Entity\Response;
use Ulysse\Business\SupportBundle\Entity\Ticket;
use Ulysse\Business\SupportBundle\Form\ResponseType;
use Ulysse\Business\SupportBundle\Form\TicketType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SupportFrontController extends Controller
{

    /**
     * Les tickets concernant la personne
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getManager()->getRepository('UlysseBusinessSupportBundle:Ticket');

        $tickets = $repo->findBy(array('user' => $this->get('security.context')->getToken()->getUser()));

        return $this->render('UlysseBusinessSupportBundle:Front:index.html.twig', array(
            'tickets' => $tickets)
        );
    }


    public function showTicketAction($id)
    {
        $ticket = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('UlysseBusinessSupportBundle:Ticket')
            ->find($id);

        $response = new Response();

        $form = $this->createResponseCreateForm($response);

        $form->get('ticket')->setData($ticket);

        return $this->render('UlysseBusinessSupportBundle:Front:showTicket.html.twig', array(
            'ticket' => $ticket,
            'form'   => $form->createView(),
        ));
    }


    public function createSupportRequestAction(Request $request)
    {

        $ticket = new Ticket();
        $form = $this->createFormTicket($ticket);
        $form->handleRequest($request);

        $ticket->setFenced(false)
               ->setUser($this->get('security.context')->getToken()->getUser())
               ->setDate(new \DateTime())
               ->setSeen(false);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            return $this->redirect($this->generateUrl('ulysse_support_show_request', array('id' => $ticket->getId())));
        }

        return $this->render('UlysseBusinessSupportBundle:Front:addSupportRequest.html.twig', array(
            'ticket' => $ticket,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function newSupportRequestAction()
    {
        $ticket = new Ticket();
        $form = $this->createFormTicket($ticket);

        return $this->render('UlysseBusinessSupportBundle:Front:addSupportRequest.html.twig', array(
            'entity' => $ticket,
            'form'   => $form->createView(),
        ));
    }


    private function createFormTicket(Ticket $ticket)
    {
        $form = $this->createForm(new TicketType(), $ticket, array(
            'action' => $this->generateUrl('ulysse_support_create_request_support'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider', 'attr' => array('class' => 'btn btn-success pull-right')));

        return $form;
    }


    /**
     * Creates a form to create a Response entity.
     *
     * @param Response $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createResponseCreateForm(Response $entity)
    {
        $form = $this->createForm(new ResponseType(), $entity, array(
            'action' => $this->generateUrl('response_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Répondre', 'attr' => array('class' => 'pull-right btn btn-primary')));

        return $form;
    }

    /**
     * Creates a new Response entity.
     *
     */
    public function createResponseAction(Request $request)
    {

        $response = new Response();
        $form = $this->createResponseCreateForm($response);
        $form->handleRequest($request);

        $response->setDate(new \DateTime())
                 ->setSeen(false)
                 ->setUser($this->get('security.context')->getToken()->getUser());


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush();

            return $this->redirect($this->generateUrl('ulysse_support_show_request', array(
                'id' => $response->getTicket()->getId()
            )));
        }

        return $this->render('UlysseBusinessSupportBundle:Front:showTicket.html.twig', array(
            'ticket' => $response->getTicket(),
            'form'   => $form->createView(),
        ));
    }


}
