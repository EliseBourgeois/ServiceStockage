<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stockage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Stockage controller.
 *
 * @Route("stockage")
 */
class StockageController extends Controller
{
    /**
     * Lists all stockage entities.
     *
     * @Route("/", name="stockage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stockages = $em->getRepository('AppBundle:Stockage')->findAll();

        return $this->render('stockage/index.html.twig', array(
            'stockages' => $stockages,
        ));
    }

    /**
     * Creates a new stockage entity.
     *
     * @Route("/new", name="stockage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stockage = new Stockage();
        $form = $this->createForm('AppBundle\Form\StockageType', $stockage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stockage);
            $em->flush();

            return $this->redirectToRoute('stockage_show', array('id' => $stockage->getId()));
        }

        return $this->render('stockage/new.html.twig', array(
            'stockage' => $stockage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stockage entity.
     *
     * @Route("/{id}", name="stockage_show")
     * @Method("GET")
     */
    public function showAction(Stockage $stockage)
    {
        $deleteForm = $this->createDeleteForm($stockage);

        return $this->render('stockage/show.html.twig', array(
            'stockage' => $stockage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stockage entity.
     *
     * @Route("/{id}/edit", name="stockage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stockage $stockage)
    {
        $deleteForm = $this->createDeleteForm($stockage);
        $editForm = $this->createForm('AppBundle\Form\StockageType', $stockage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stockage_edit', array('id' => $stockage->getId()));
        }

        return $this->render('stockage/edit.html.twig', array(
            'stockage' => $stockage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stockage entity.
     *
     * @Route("/{id}", name="stockage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Stockage $stockage)
    {
        $form = $this->createDeleteForm($stockage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stockage);
            $em->flush();
        }

        return $this->redirectToRoute('stockage_index');
    }

    /**
     * Creates a form to delete a stockage entity.
     *
     * @param Stockage $stockage The stockage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stockage $stockage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stockage_delete', array('id' => $stockage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
