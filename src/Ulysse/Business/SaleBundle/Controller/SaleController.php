<?php

namespace Ulysse\Business\SaleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ulysse\Business\ProductBundle\Form\ProductType;
use Ulysse\Business\SaleBundle\Entity\Sale;
use Ulysse\Business\SaleBundle\Form\Type\ImageType;
use Ulysse\Business\SaleBundle\Form\Type\SaleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Sale controller.
 *
 */
class SaleController extends Controller
{

    /**
     * Lists all Sale entities.
     *
     */
    public function indexAction($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        $nbPerPages = 12;
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessSaleBundle:Sale')->getSalesFront($page, $nbPerPages);
        $nbPages = ceil(count($entities) / $nbPerPages);

        return $this->render('UlysseBusinessSaleBundle:Sale:index.html.twig', array(
            'entities'  => $entities,
            'titlePage' => 'Produits disponibles à la vente',
            'nbPages'      => $nbPages,
            'page'         => $page
        ));
    }

    /**
     * Creates a new Sale entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function createAction(Request $request)
    {
//        var_dump($request->request->get('ulysse_business_salebundle_sale'));exit;

        $entity = new Sale();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $user = $this->get('security.context')->getToken()->getUser();

        //We add the current User
        $entity->setUser($user);
        $entity->setBlocked(false);

        $entity->getProduct()->setAddedby($user);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sale_show', array('id' => $entity->getId())));
        }

        return $this->render('UlysseBusinessSaleBundle:Sale:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function createImbriqueAction(Request $request)
    {
        $entity = new Sale();
        $form = $this->createCreateImbriqueForm($entity);
        $form->handleRequest($request);

        $user = $this->get('security.context')->getToken()->getUser();

        //We add the current User
        $entity->setUser($user);
        $entity->setBlocked(false);

        $entity->getProduct()->setAddedby($user);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sale_show', array('id' => $entity->getId())));
        }

        return $this->render('UlysseBusinessSaleBundle:Sale:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Sale entity.
     *
     * @param Sale $entity The entity
     *
     * @return Form The form
     */
    private function createCreateForm(Sale $entity)
    {
        $form = $this->createForm(new SaleType(), $entity, array(
            'action' => $this->generateUrl('sale_create'),
            'method' => 'POST',
        ));

        $form->remove('product');
        $form->add('product', null, array('label' => false, 'attr' => array('class' => 'hidden')));

        $form->add('submit', 'submit', array('label' => 'Ajouter', 'attr' => array('class' => 'pull-right btn btn-primary btn_add_product')));

        return $form;
    }


    private function createCreateImbriqueForm(Sale $entity)
    {
        $form = $this->createForm(new SaleType(), $entity, array(
            'action' => $this->generateUrl('sale_create_imbrique'),
            'method' => 'POST',
        ));

        $form->remove('product');
        $form->add('product', new ProductType(), array('label' => false));

        $form->add('submit', 'submit', array('label' => 'Ajouter', 'attr' => array('class' => 'pull-right btn btn-primary btn_add_product')));

        return $form;
    }


    /**
     * Displays a form to create a new Sale entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction(Request $request)
    {
        $idProduct = $request->request->get('id');
        $product = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('UlysseBusinessProductBundle:Product')
                        ->find($idProduct);
        $sale = new Sale();

        if(is_null($product)) {
            $form = $this->createCreateImbriqueForm($sale);
        } else {
            $sale->setProduct($product);
            $form = $this->createCreateForm($sale);
        }

        return $this->render('UlysseBusinessSaleBundle:Sale:new.html.twig', array(
            'entity' => $sale,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sale entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UlysseBusinessSaleBundle:Sale:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sale entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sale entity.');
        } else if ($entity->getUser() !== $this->get('security.context')->getToken()->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UlysseBusinessSaleBundle:Sale:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Sale entity.
     *
     * @param Sale $entity The entity
     *
     * @return Form The form
     */
    private function createEditForm(Sale $entity)
    {
        $form = $this->createForm(new SaleType(), $entity, array(
            'action' => $this->generateUrl('sale_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->remove('product');
        $form->add('product', null, array('disabled' => true));
        
        $form->remove('image');
        $form->add('image', new ImageType(), array('label' => 'Image', 'required' => false));
        
        if ($entity->getProduct()->getState() == 0 &&
                $entity->getProduct()->getAddedby() === $this->get('security.context')->getToken()->getUser()) {
            $form->add('product', new ProductType($entity->getProduct()));
        } else {
            $form->add('product', null, array('disabled' => true));
        }
        
        $form->add('submit', 'submit', array('label' => 'Modifier', 'attr' => array('class' => 'btn btn-success pull-right btn_add_product')));

        return $form;
    }

    /**
     * Edits an existing Sale entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sale entity.');
        } else if ($entity->getUser() !== $this->get('security.context')->getToken()->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sale_edit', array('id' => $id)));
        }

        return $this->render('UlysseBusinessSaleBundle:Sale:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sale entity.
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sale entity.');
            } else if ($entity->getUser() !== $this->get('security.context')->getToken()->getUser()) {
                throw $this->createAccessDeniedException();
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sale'));
    }

    /**
     * Creates a form to delete a Sale entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('sale_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Supprimer', 'attr' => array('class' => 'btn btn-danger')))
                    ->getForm();
    }

    public function showMyArticleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $sale = $em->getRepository('UlysseBusinessSaleBundle:Sale')->findByUser($user);

        return $this->render('UlysseBusinessSaleBundle:Sale:myArticle.html.twig', array(
            'sales'  => $sale
        ));
    }

    /**
     * @return Response
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function showNewProductAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessSaleBundle:Sale')->findNew();

        return $this->render('UlysseBusinessSaleBundle:Sale:index.html.twig', array(
            'entities'  => $entities,
            'titlePage' => 'Nouveautés'
        ));
    }


    /**
     * Obtenir les articles correcpondant à un ID Produit type données
     *
     * @param $IdProduct
     * @return Response
     */
    public function showSaleAvailableByProductTypeAction($IdProduct)
    {
        $em = $this->getDoctrine()->getManager();

        $sales = $em->getRepository('UlysseBusinessSaleBundle:Sale')->findSaleAvailableByProductType($IdProduct);

        return $this->render('UlysseBusinessSaleBundle:Sale:showSaleByProduct.html.twig', array(
            'sales' => $sales
        ));
    }


    /**
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function choiceCategoryForAddProductAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('UlysseBusinessProductBundle:Category')->findBy(array('active' => 1));

        return $this->render('UlysseBusinessSaleBundle:Sale:addProduct.html.twig', array(
            'categories' => $categories
        ));
    }

    public function choiceProductForAddProductAction(Request $request)
    {

        $id_category = $request->request->get('id');

        $products = $this->getDoctrine()->getManager()->getRepository('UlysseBusinessProductBundle:Product')->findBy(array('category' => $id_category, 'state' => 1));

        return $this->render('UlysseBusinessSaleBundle:Sale:choiceProduct.html.twig', array(
            'products' => $products
        ));
    }


    public function getNbProductSaleAvailableAction($idProductType)
    {
        $result = $this->getDoctrine()
            ->getManager()
            ->getRepository('UlysseBusinessSaleBundle:Sale')
            ->findNbProductSaleAvailable($idProductType);


        return new Response($result[1]);
    }

    public function getMinPriceProductSaleAvailableAction($idProductType)
    {
        $result = $this->getDoctrine()
            ->getManager()
            ->getRepository('UlysseBusinessSaleBundle:Sale')
            ->findMinPriceProductSaleAvailable($idProductType);


        return new Response($result[1]);
    }

}
