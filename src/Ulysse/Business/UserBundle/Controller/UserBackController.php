<?php

namespace Ulysse\Business\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * User controller.
 *
 */
class UserBackController extends Controller
{
    
    /**
     * Affiche le header ds utilisateur
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function headerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countBlockedMembers = $em->getRepository('UlysseBusinessUserBundle:User')->countBlockedMembers();
        $countActifMembersToday = $em->getRepository('UlysseBusinessUserBundle:User')->countActifMembersToday();
        $countAllMembers = $em->getRepository('UlysseBusinessUserBundle:User')->countAllMembers();
        $countBannedMembers = $em->getRepository('UlysseBusinessUserBundle:User')->countBannedMembers();

        return $this->render('UlysseBusinessUserBundle:Back:header.html.twig', array(
                    'countBlockedMembers' => $countBlockedMembers[0][1],
                    'countActifMembersToday' => $countActifMembersToday[0][1],
                    'countAllMembers' => $countAllMembers[0][1],
                    'countBannedMembers' => $countBannedMembers[0][1]
        ));
    }

    /**
     * Affiche le Détail d'un utilisateur
     * 
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws notFoundException si l'id donné ne correspond à aucun utilisateur
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $parent = 'UlysseBusinessUserBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }
        
        return $this->render('UlysseBusinessUserBundle:Back:show.html.twig', array(
                    'entity' => $entity,
                    'parent' => $parent
        ));
    }
    
    /**
     * 
     * @param string $mode ['all', 'banned', 'blocked']
     * @param string $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($mode = 'all', $page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPerPage = 5;
        
        switch ($mode) {
            case 'all':
                $entities = $em->getRepository('UlysseBusinessUserBundle:User')->getUsers($page, $nbPerPage);
                $title = 'Tous les utilisateurs';
                break;
            case 'banned':
                $entities = $em->getRepository('UlysseBusinessUserBundle:User')->getUsersBanned($page, $nbPerPage);
                $title = 'Utilisateurs bannis';
                break;
            case 'blocked':
                $entities = $em->getRepository('UlysseBusinessUserBundle:User')->getUsersBlocked($page, $nbPerPage);
                $title = 'Utilisateurs bloqués';
                break;
            default:
                break;
        }

        $parent = 'UlysseBusinessUserBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        $nbPages = ceil(count($entities) / $nbPerPage);

        return $this->render('UlysseBusinessUserBundle:Back:list.html.twig', array(
                    'entities' => $entities,
                    'parent' => $parent,
                    'title' => $title,
                    'nbPages' => $nbPages,
                    'page' => $page,
                    'mode' => $mode
        ));
    }

    /**
     * Banni l'utilisateur donné
     * 
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws notFoundException si l'id donné ne correspond à aucun utilisateur
     */
    public function bannishAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessUserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setLocked(true);
            $entity->setBlocked(false);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessUserBundle:UserBack:list', array('id' => $id));
    }

    /**
     * réactive l'utilisateur donné si clui ci a été banni
     * 
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws notFoundException si l'id donné ne correspond à aucun utilisateur
     */
    public function activateAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessUserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setLocked(false);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessUserBundle:UserBack:list', array('id' => $id));
    }

    /**
     * Bloque l'utilisateur donné
     * 
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws notFoundException si l'id donné ne correspond à aucun utilisateur
     */
    public function blockAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessUserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setBlocked(true);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessUserBundle:UserBack:list', array('id' => $id));
    }

    /**
     * débloque l'utilisateur donné si clui ci a été bloqué
     * 
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws notFoundException si l'id donné ne correspond à aucun utilisateur
     */
    public function unblockAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessUserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setBlocked(false);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessUserBundle:UserBack:list', array('id' => $id));
    }

}
