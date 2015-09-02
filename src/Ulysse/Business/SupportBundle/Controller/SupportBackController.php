<?php

namespace Ulysse\Business\SupportBundle\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as ResponseRequest;
use Ulysse\Business\SupportBundle\Entity\Response;
use Ulysse\Business\SupportBundle\Entity\Ticket;
use Ulysse\Business\SupportBundle\Form\TicketType;
use Ulysse\Business\UserBundle\Entity\User;

class SupportBackController extends Controller
{
    
    /**
     * Génère le menu du support
     * 
     * @return ResponseRequest
     */
    public function sideAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countOpen = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->countTicketsOpen();
        $countFenced = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->countTicketsFenced();
        $countNotSeen = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->countNotSeenTickets();
        $countUnanswerable = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->countUnanswerableTickets();

        return $this->render('UlysseBusinessSupportBundle:Back:side.html.twig', array(
            'countOpen' => $countOpen[0][1],
            'countFenced' => $countFenced[0][1],
            'countNotSeen' => $countNotSeen[0][1],
            'countUnanswerable' => $countUnanswerable[0][1]
        ));
    }

    /**
     * Affiche un ticket
     * 
     * @param integer $id
     * @return ResponseRequest
     * @throws NotFoundException si le ticket n'existe pas
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $ticket = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->find($id);
        if (!$ticket->getSeen()) {
            $ticket->setSeen(true);
            $em->persist($ticket);
            $em->flush();
        }
        $responses = $em->getRepository('UlysseBusinessSupportBundle:Response')->findBy(array('ticket' => $id));

        if (!$ticket) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $parent = 'UlysseBusinessSupportBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        return $this->render('UlysseBusinessSupportBundle:Back:show.html.twig', array(
                    'parent' => $parent,
                    'ticket' => $ticket,
                    'responses' => $responses
        ));
    }

    /**
     * List les messages
     * 
     * @param string $mode ['all', 'notseen', 'unanswerable', 'fenced']
     * @param integer $page
     * @return ResponseRequest
     */
    public function listAction($mode = 'all', $page)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPerPage = 5;
        switch ($mode) {
            case 'all':
                $messages = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->getTicketsOpen($page, $nbPerPage);
                $title = 'Tickets ouverts';
                break;
            case 'notseen':
                $messages = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->getTicketsNotSeen($page, $nbPerPage);
                $title = 'Tickets non lues';
                break;
            case 'unanswerable':
                $messages = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->getTicketsUntreated($page, $nbPerPage);
                $title = 'Tickets non traités';
                break;
            case 'fenced':
                $messages = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->getTicketsFenced($page, $nbPerPage);
                $title = 'Tickets clôturés';
                break;
            default:
                break;
        }

        $parent = 'UlysseBusinessSupportBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        $nbPages = ceil(count($messages) / $nbPerPage);
        
        return $this->render('UlysseBusinessSupportBundle:Back:list.html.twig', array(
                    'parent' => $parent,
                    'messages' => $messages,
                    'nbPages' => $nbPages,
                    'page' => $page,
                    'title' => $title,
                    'mode' => $mode
        ));
    }

    /**
     * Créé une réponse à un ticket
     * 
     * @param Request $request
     * @param integer $id
     * @return ResponseRequest
     */
    public function replyAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            
            $ticket = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->find($id);
            $user = $this->container->get('security.context')->getToken()->getUser();
            
            $response = new Response();
            $response->setContent($request->request->get('response'));
            $response->setTicket($ticket);
            $response->setUser($user);
            
            $em->persist($response);
            $em->flush();
        
        }
        return $this->forward('UlysseBusinessSupportBundle:SupportBack:show',
                array('id' => $id));
    }

    /**
     * Ecrit un nouveau ticket depuis le back
     * 
     * @param Request $request
     * @param User $user
     * @return ResponseRequest
     */
    public function writeAction(Request $request,User $user)
    {
        $parent = 'UlysseBusinessSupportBundle:Back:index.html.twig';
        
        $ticket = new Ticket();
        $form = $this->createFormTicket($ticket);
        $form->handleRequest($request);
            
        if ($request->isXmlHttpRequest()) {
            
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository('UlysseBusinessUserBundle:User')->find($user);
                
                $ticket->setFenced(false)
                       ->setUser($user)
                       ->setDate(new DateTime())
                       ->setSeen(false)
                       ->setTitle('ADMINISTRATION : '.$ticket->getTitle());
                
                $em->persist($ticket);
                $em->flush();

                return $this->forward('UlysseBusinessSupportBundle:SupportBack:show',
                        array('id' => $ticket->getId())
                        );
            }
            
            $parent = ':ajax:empty.html.twig';
        
        }

        return $this->render('UlysseBusinessSupportBundle:Back:write.html.twig', array(
                    'form' => $form->createView(),
                    'parent' => $parent,
                    'user' => $user
        ));
    }

    /**
     * 
     * @param Ticket $ticket
     * @return ResponseRequest
     */
    private function createFormTicket(Ticket $ticket)
    {
        $form = $this->createForm(new TicketType(), $ticket, array(
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Clôture un ticket
     * 
     * @param Request $request
     * @param integer $id
     * @return ResponseRequest
     */
    public function fenceAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            
            $ticket = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->find($id);
            $ticket->setFenced(true);
            
            $em->persist($ticket);
            $em->flush();
        
        }
        return $this->forward('UlysseBusinessSupportBundle:SupportBack:show', array('id' => $id));
    }

}
