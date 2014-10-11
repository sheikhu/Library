<?php

namespace Sheikhu\LibraryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sheikhu\LibraryBundle\Entity\Pret;
use Sheikhu\LibraryBundle\Form\PretType;

/**
 * Pret controller.
 *
 */
class PretController extends Controller
{

    /**
     * Lists all Pret entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SheikhuLibraryBundle:Pret')->findAll();

        return $this->render('SheikhuLibraryBundle:Pret:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pret entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pret();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prets_show', array('id' => $entity->getId())));
        }

        return $this->render('SheikhuLibraryBundle:Pret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pret entity.
     *
     * @param Pret $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pret $entity)
    {
        $form = $this->createForm(new PretType(), $entity, array(
            'action' => $this->generateUrl('prets_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pret entity.
     *
     */
    public function newAction()
    {
        $entity = new Pret();
        $form   = $this->createCreateForm($entity);

        return $this->render('SheikhuLibraryBundle:Pret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pret entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SheikhuLibraryBundle:Pret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SheikhuLibraryBundle:Pret:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pret entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SheikhuLibraryBundle:Pret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pret entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SheikhuLibraryBundle:Pret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pret entity.
    *
    * @param Pret $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pret $entity)
    {
        $form = $this->createForm(new PretType(), $entity, array(
            'action' => $this->generateUrl('prets_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pret entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SheikhuLibraryBundle:Pret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('prets_edit', array('id' => $id)));
        }

        return $this->render('SheikhuLibraryBundle:Pret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pret entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SheikhuLibraryBundle:Pret')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pret entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prets'));
    }

    /**
     * Creates a form to delete a Pret entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prets_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
