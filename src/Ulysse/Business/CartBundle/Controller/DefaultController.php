<?php

namespace Ulysse\Business\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    /**
     * Page "Mon Panier"
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
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

        return $this->render('UlysseBusinessCartBundle::index.html.twig',
            array(
                'entities'    => $entities,
                'quantity'    => $quantity,
                'total_price' => $price
            )
        );
    }

    /**
     * Menu latéral droit résumant les articles présent dans le panier
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function menuCartFrontAction()
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

        return $this->render('UlysseBusinessCartBundle:Cart:menu.html.twig',
            array(
                'entities'    => $entities,
                'quantity'    => $quantity,
                'total_price' => $price
            )
        );

    }

    /**
     * Nombre de produit présent dans le panier
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function countArticleCartAction()
    {
        $articles = $this->get('session')->get('articleInMyCart');
        $quantity = 0;

        if (!is_null($articles) && $articles != '' && is_array($articles)) {
            foreach ($articles as $article) {
                $quantity += (int)$article['quantity'];
            }
        }

        return $this->render('UlysseBusinessCartBundle:Cart:count.html.twig',
            array(
                'quantity' => $quantity
            )
        );

    }

    /**
     * Ajouter un article au panier
     *
     * @param $id_article
     * @param $quantity
     * @param $redirect
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addArticleToMyCartAction($id_article, $quantity, $redirect)
    {
        $session = $this->get('session');

        $articleInMyCart = is_null($session->get('articleInMyCart')) || $session->get('articleInMyCart') == '' ? array() : $session->get('articleInMyCart');

        if ($this->recursive_array_search($id_article, $articleInMyCart) !== false) {
            $session->getFlashBag()->add('warning', "Cet article est déjà dans ton panier");
        } else {
            array_push($articleInMyCart, array('article_id' => $id_article, 'quantity' => $quantity));
            $session->set('articleInMyCart', $articleInMyCart);
            $session->getFlashBag()->add('success', "L'article a bien été ajouté à ton panier");
        }

        if ($redirect) {
            return $this->redirect($this->generateUrl('ulysse_business_check_address'));
        }

        $referer = $this->getRequest()->headers->get('referer');

        return $this->redirect($referer);
    }

    /**
     * Supprimer un article du panier
     *
     * @param $id_article
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteArticleFromMyCartAction($id_article)
    {
        $session = $this->get('session');
        $articleInMyCart = is_null($session->get('articleInMyCart')) || $session->get('articleInMyCart') == '' ? array() : $session->get('articleInMyCart');

        $key = $this->recursive_array_search($id_article, $articleInMyCart);
        if ($key !== false) {
            unset($articleInMyCart[$key]);
        }

        $session->set('articleInMyCart', $articleInMyCart);

        $session->getFlashBag()->add('success', "L'article a bien été supprimé de ton panier");

        $referer = $this->getRequest()->headers->get('referer');

        return $this->redirect($referer);
    }

    /**
     * Fonction permettant de faire une recherche dans un tableau multidimensionnel
     * (Utiliser pour savoir si un produit n'est pas déjà dans le panier)
     *
     * @param $needle
     * @param $haystack
     * @return bool|int|string
     */
    private function recursive_array_search($needle, $haystack)
    {
        foreach ($haystack as $keyreturn => $value) {
            if ($key = array_search($needle, $value)) {
                return $keyreturn;
            }
        }

        return false;
    }
}
