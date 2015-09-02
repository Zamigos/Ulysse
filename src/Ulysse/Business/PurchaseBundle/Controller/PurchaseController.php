<?php

namespace Ulysse\Business\PurchaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ulysse\Business\PurchaseBundle\Entity\Purchase;
use Ulysse\Business\PurchaseBundle\Entity\Rating;
use Ulysse\Business\PurchaseBundle\Entity\Salepurchase;
use Ulysse\Business\PurchaseBundle\Form\PurchaseType;
use Ulysse\Business\PurchaseBundle\Form\RatingType;


class PurchaseController extends Controller
{

    /**
     * Méthode pour valider un achat et l'enregistrer en base
     */
    public function purchaseProductsAction(Request $request)
    {
        $articles = $this->get('session')->get('articleInMyCart');


        if ($request->isMethod('GET') || empty($articles)) {
            return $this->redirect($this->generateUrl('ulysse_businnes_list_command_past'));
        }

        $price = 0;
        if (!is_null($articles) && $articles != '' && is_array($articles)) {
            $repo = $this->getDoctrine()->getManager()->getRepository('UlysseBusinessSaleBundle:Sale');
            foreach ($articles AS $article) {
                $a = $repo->find($article['article_id']);
                $price += $a->getPrice() * $article['quantity'];
            }
        }


        $articles = $this->get('session')->get('articleInMyCart');
        $em = $this->getDoctrine()->getManager();
        $repoSale = $em->getRepository('UlysseBusinessSaleBundle:Sale');
        $repoStatus = $em->getRepository('UlysseBusinessPurchaseBundle:Status');

        $purchase = new Purchase();
        $purchase->setUser($this->get('security.context')->getToken()->getUser())
                 ->setAmountTotal($price);

        $form = $this->createFormCheckAdress($purchase);
        $form->handleRequest($request);

        //En premier lieu on insère en base la vente général
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchase);
            $em->flush();

        }

        //Puis la vente des produits

        if ($articles !== null) {

            $status = $repoStatus->find(1);

            foreach ($articles as $article) {
                $artToBuy = $repoSale->find($article['article_id']);
                $artToBuy->setStock($artToBuy->getStock() - $article['quantity']);

                $salePurchase = new Salepurchase();
                $salePurchase->setPurchase($purchase)
                             ->setQuantity($article['quantity'])
                             ->setSale($artToBuy)
                             ->setStatus($status)
                             ->setAmount($artToBuy->getPrice() * $article['quantity'])
                             ->setStatusDate(new \DateTime());

                $em->persist($salePurchase);
            }
            $em->flush();
        }
        //Vide les articles en session
        $this->get('session')->set('articleInMyCart', '');

        return $this->redirect($this->generateUrl('ulysse_business_pay_command_past', array('id' => $purchase->getId())));
    }


    public function checkAddressAction()
    {

        $articles = $this->get('session')->get('articleInMyCart');
        $entities = array();
        $quantity = array();
        $price = 0;

        if (!is_null($articles) && $articles != '' && is_array($articles)) {
            $repo = $this->getDoctrine()->getManager()->getRepository('UlysseBusinessSaleBundle:Sale');
            foreach ($articles AS $article) {
                $a = $repo->find($article['article_id']);
                $quantity[$a->getId()] = $article['quantity'];
                $price += $a->getPrice() * $article['quantity'];
                $entities[] = $a;
            }
        }

        //Création du formulaire pour l'adresse de livraison

        $user = $this->get('security.context')->getToken()->getUser();
        $purchase = new Purchase();
        //On prédéfini les infos de l'user
        $purchase->setFirstname($user->getFirstname())
                 ->setLastname($user->getLastname())
                 ->setAddress($user->getAddress())
                 ->setCp($user->getCp())
                 ->setCity($user->getCity())
                 ->setCountry($user->getCountry());

        $form = $this->createFormCheckAdress($purchase);

        return $this->render('UlysseBusinessPurchaseBundle:Purchase:checkAddress.html.twig',
                             array(
                                 'entities'    => $entities,
                                 'quantity'    => $quantity,
                                 'total_price' => $price,
                                 'form'        => $form->createView()
                             )
        );

    }


    public function createFormCheckAdress(Purchase $purchase)
    {
        $form = $this->createForm(new PurchaseType(), $purchase, array(
            'action' => $this->generateUrl('ulysse_business_proceed_to_purchase'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Confirmer', 'attr' => array('class' => 'btn btn-success pull-right')));

        return $form;
    }

    /**
     * Liste les produits que l'utilisateur à vendu
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listArticlesSaleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessPurchaseBundle:Salepurchase');

        $salearticle = $repo->findArticlesSale($this->get('security.context')->getToken()->getUser()->getId());

        return $this->render('UlysseBusinessPurchaseBundle:Purchase:articlessale.html.twig', array('articlesale' => $salearticle));
    }

    public function listCommandPastAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessPurchaseBundle:Purchase');
        $command = $repo->findCommandWithArticle($this->get('security.context')->getToken()->getUser()->getId());

        return $this->render('UlysseBusinessPurchaseBundle:Purchase:commandPast.html.twig', array('commands' => $command));
    }

    public function payOrderPastAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessPurchaseBundle:Purchase');
        $order = $repo->find($id);
        if ($order->getUser() !== $this->get('security.context')->getToken()->getUser()) {
            throw $this->createAccessDeniedException();
        }
        
        if ($order->getPayed()) {
            $this->get('session')->getFlashBag()->add('success', 'La commande a été payée, vous recevrez vos articles d\'ici quelques jours');
            return $this->redirect($this->generateUrl('ulysse_business_resume_order',
                array('id' => $order->getId())));
        }
        
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessPurchaseBundle:Status');
        $status = $repo->find(2);
        
        foreach ($order->getSalepurchase() as $salepurchase) {
            $salepurchase->setStatus($status);
            $em->persist($salepurchase);
        }
        
        $order->setPayed(true);
        $em->persist($order);
        $em->flush();
        return $this->render('UlysseBusinessPurchaseBundle:Purchase:payOrderPast.html.twig',
            array('order' => $order));
    }

    public function resumeOrderAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessPurchaseBundle:Purchase');
        $order = $repo->find($id);
        
        if ($order->getUser() !== $this->get('security.context')->getToken()->getUser()) {
            throw $this->createAccessDeniedException();
        }
        
        return $this->render('UlysseBusinessPurchaseBundle:Purchase:resumeOrder.html.twig',
                array('order' => $order));
    }

    public function iReceivedThePackageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $salePurchase = $em->getRepository('UlysseBusinessPurchaseBundle:Salepurchase')->find($id);
        $status = $em->getRepository('UlysseBusinessPurchaseBundle:Status')->find(4);
        $salePurchase->setStatus($status);

        
        $this->get('session')->getFlashBag()->add('success', 'Colis Reçu : Vous pouvez maintenant évaluer le vendeur.');
        
        $em->flush();
        $em->persist($salePurchase);

        return $this->redirect($this->generateUrl('ulysse_businnes_list_command_past'));

    }

    public function addRatingToUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $salePurchase = $em->getRepository('UlysseBusinessPurchaseBundle:Salepurchase')->find($id);

        $rating = new Rating();
        $form = $this->createFromRating($rating, $id);

        return $this->render('UlysseBusinessPurchaseBundle:Rating:addRatingToUser.html.twig', array(
            'form' => $form->createView(),
            'salepurchase' => $salePurchase
        ));

    }

    public function createRatingToUserAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $salePurchase = $em->getRepository('UlysseBusinessPurchaseBundle:Salepurchase')->find($id);

        $rating = new Rating();
        $form = $this->createFromRating($rating, $id);
        $form->handleRequest($request);
        $rating->setUser($salePurchase->getSale()->getUser());




        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->flush();

            $salePurchase->setRating($rating);
            $em->persist($salePurchase);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success', "L'évaluation a bien été prise en compte.");

            return $this->redirect($this->generateUrl('ulysse_businnes_list_command_past'));
        }

        return $this->render('UlysseBusinessPurchaseBundle:Rating:addRatingToUser.html.twig', array(
            'form' => $form->createView(),
            'salepurchase' => $salePurchase
        ));
    }


    public function createFromRating(Rating $rating, $id)
    {
        $form = $this->createForm(new RatingType(), $rating, array(
            'action' => $this->generateUrl('create_rating_user', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Noter'));

        return $form;
    }

    public function iSendMyPackageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $salepurchase = $em->getRepository('UlysseBusinessPurchaseBundle:Salepurchase')->find($id);
        $status = $em->getRepository('UlysseBusinessPurchaseBundle:Status')->find(3);
        $salepurchase->setStatus($status);

        $em->flush();
        $em->persist($salepurchase);
        
        $this->get('session')->getFlashBag()->add('success', 'Colis envoyé.');

        return $this->redirect($this->generateUrl('ulysse_business_list_articles_sale'));
    }
}
