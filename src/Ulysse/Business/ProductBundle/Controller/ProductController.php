<?php

namespace Ulysse\Business\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Ulysse\Business\ProductBundle\Entity\Product;
use Ulysse\Business\ProductBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    /**
     * Lister tous les produits valides pour la vente
     *
     */
    public function indexAction($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        //Nombre de produit à afficher par page
        $nbPerPages = 12;
        //On va chercher les produits disponibles
        $listProducts = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('UlysseBusinessProductBundle:Product')
                             ->findAllProduct($page, $nbPerPages);
        //Calcule pour la pagination
        $nbPages = ceil(count($listProducts) / $nbPerPages);

        return $this->render('UlysseBusinessProductBundle:Product:index.html.twig', array(
            'products' => $listProducts,
            'nbPages'      => $nbPages,
            'page'         => $page
        ));
    }

    /**
     * Creates a new Product entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function createAction(Request $request)
    {

        $entity = new Product();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        //We add the current User
        $entity->setAddedby($this->get('security.context')->getToken()->getUser());

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product_show', array('id' => $entity->getId())));
        }

        return $this->render('UlysseBusinessProductBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Product $entity)
    {
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('product_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Product entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction(Request $request)
    {
        $category_id = $request->request->get('id');
        $category = $this->getDoctrine()->getManager()->getRepository('UlysseBusinessProductBundle:Category')->find($category_id);

        $entity = new Product();
        $entity->setCategory($category);
        $form = $this->createCreateForm($entity);

        return $this->render('UlysseBusinessProductBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }


        $sales = $em->getRepository('UlysseBusinessSaleBundle:Sale')->findSaleAvailableByProductType($id);


        return $this->render('UlysseBusinessProductBundle:Product:show.html.twig', array(
            'product' => $product,
            'sales' => $sales
        ));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('product'));
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('product_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm();
    }


    public function getAllProductByCategoryAction($category_name, $page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }

        $em = $this->getDoctrine()
                   ->getManager();

        $category = $em->getRepository('UlysseBusinessProductBundle:Category')
                       ->findOneBy(array('slug' => $category_name));

        if (empty($category)) {
            throw $this->createNotFoundException("La catégorie " . $category_name . " n'existe pas.");
        }

        //Nombre de produit à afficher par page
        $nbPerPages = 12;
        //On va chercher les produits disponibles
        $listProducts = $em->getRepository('UlysseBusinessProductBundle:Product')
                           ->findAllProductByCategory($category->getId(), $page, $nbPerPages);
        //Calcule pour la pagination
        $nbPages = ceil(count($listProducts) / $nbPerPages);

        return $this->render('UlysseBusinessProductBundle:Product:productByCat.html.twig', array(
            'products' => $listProducts,
            'category' => $category_name,
            'nbPages'      => $nbPages,
            'page'         => $page
        ));
    }

    /**
     * Recupère le nom des 9 derniers produits type ajouté qui sont disponible à la vente
     * pour le menu principal
     *
     */
    public function getNewAddProductAction()
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $newProducts = $em->getRepository('UlysseBusinessProductBundle:Product')
                          ->findLastProductAdd(1, 9);

        return $this->render('UlysseBusinessProductBundle:Product:newProductAdd.html.twig', array(
            'newProducts' => $newProducts
        ));
    }

    /**
     * Récupère les produits mis en selection pour le menu
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getProductInSelectionAction()
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $selectionProducts = $em->getRepository('UlysseBusinessProductBundle:Product')
                                ->findProductInSelection(1, 9);

        return $this->render('UlysseBusinessProductBundle:Product:selectionProduct.html.twig', array(
            'selectionProducts' => $selectionProducts
        ));

    }

    /**
     * Récupère les produits mis en selection pour le menu
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getTopProductsAction()
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $topProducts = $em->getRepository('UlysseBusinessProductBundle:Product')
                          ->findTopProducts(1, 9);

        return $this->render('UlysseBusinessProductBundle:Product:topProducts.html.twig', array(
            'topProducts' => $topProducts
        ));

    }


    /**
     * Récupère les produits mis en selection pour l'affichage dans la home page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getProductInSelectionHomeAction($limit)
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $products = $em->getRepository('UlysseBusinessProductBundle:Product')
                       ->findProductInSelection(1, $limit);


        return $this->render('UlysseBusinessProductBundle:Product:template.html.twig', array(
            'products' => $products
        ));

    }

    /**
     * Récupère les produits mis en selection pour l'affichage dans la home page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getTopProductsHomeAction($limit)
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $products = $em->getRepository('UlysseBusinessProductBundle:Product')
                          ->findTopProducts(1, $limit);

        return $this->render('UlysseBusinessProductBundle:Product:template.html.twig', array(
            'products' => $products
        ));
    }


    public function getPageNewProductAction($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        //Nombre de produit à afficher par page
        $nbPerPages = 12;
        //On va chercher les produits disponibles
        $listProducts = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('UlysseBusinessProductBundle:Product')
                             ->findLastProductAdd($page, $nbPerPages);
        //Calcule pour la pagination
        $nbPages = ceil(count($listProducts) / $nbPerPages);

        return $this->render('UlysseBusinessProductBundle:Product:newProduct.html.twig', array(
            'products' => $listProducts,
            'nbPages'      => $nbPages,
            'page'         => $page
        ));
    }

    public function getPageTopSaleProductAction($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        //Nombre de produit à afficher par page
        $nbPerPages = 12;
        //On va chercher les produits disponibles
        $listProducts = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('UlysseBusinessProductBundle:Product')
                             ->findTopProducts($page, $nbPerPages);
        //Calcule pour la pagination
        $nbPages = ceil(count($listProducts) / $nbPerPages);

        return $this->render('UlysseBusinessProductBundle:Product:topSale.html.twig', array(
            'products' => $listProducts,
            'nbPages'      => $nbPages,
            'page'         => $page
        ));
    }

    public function getPageProductInSelectionAction($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        //Nombre de produit à afficher par page
        $nbPerPages = 12;
        //On va chercher les produits disponibles
        $listProducts = $this->getDoctrine()
                             ->getManager()
                             ->getRepository('UlysseBusinessProductBundle:Product')
                             ->findProductInSelection($page, $nbPerPages);
        //Calcule pour la pagination
        $nbPages = ceil(count($listProducts) / $nbPerPages);

        return $this->render('UlysseBusinessProductBundle:Product:selectedProduct.html.twig', array(
            'products' => $listProducts,
            'nbPages'      => $nbPages,
            'page'         => $page
        ));
    }

}
