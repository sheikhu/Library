<?php

namespace Sheikhu\LibraryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sheikhu\LibraryBundle\Entity\MaisonEdition;
use Sheikhu\LibraryBundle\Form\MaisonEditionType;

/**
 * MaisonEdition controller.
 *
 */
class MaisonEditionController extends Controller
{

    /**
     * Lists all MaisonEdition entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SheikhuLibraryBundle:MaisonEdition')->findAll();

        return $this->render('SheikhuLibraryBundle:MaisonEdition:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new MaisonEdition entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MaisonEdition();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editeurs_show', array('id' => $entity->getId())));
        }

        return $this->render('SheikhuLibraryBundle:MaisonEdition:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MaisonEdition entity.
     *
     * @param MaisonEdition $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MaisonEdition $entity)
    {
        $form = $this->createForm(new MaisonEditionType(), $entity, array(
            'action' => $this->generateUrl('editeurs_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MaisonEdition entity.
     *
     */
    public function newAction()
    {
        $entity = new MaisonEdition();
        $form   = $this->createCreateForm($entity);

        return $this->render('SheikhuLibraryBundle:MaisonEdition:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MaisonEdition entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SheikhuLibraryBundle:MaisonEdition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaisonEdition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SheikhuLibraryBundle:MaisonEdition:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MaisonEdition entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SheikhuLibraryBundle:MaisonEdition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaisonEdition entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SheikhuLibraryBundle:MaisonEdition:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MaisonEdition entity.
    *
    * @param MaisonEdition $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MaisonEdition $entity)
    {
        $form = $this->createForm(new MaisonEditionType(), $entity, array(
            'action' => $this->generateUrl('editeurs_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MaisonEdition entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SheikhuLibraryBundle:MaisonEdition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaisonEdition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('editeurs_edit', array('id' => $id)));
        }

        return $this->render('SheikhuLibraryBundle:MaisonEdition:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a MaisonEdition entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SheikhuLibraryBundle:MaisonEdition')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MaisonEdition entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('editeurs'));
    }

    /**
     * Creates a form to delete a MaisonEdition entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editeurs_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
