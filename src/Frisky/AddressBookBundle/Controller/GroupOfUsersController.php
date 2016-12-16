<?php

namespace Frisky\AddressBookBundle\Controller;

use Frisky\AddressBookBundle\Entity\GroupOfUsers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Groupofuser controller.
 *
 * @Route("groupofusers")
 */
class GroupOfUsersController extends Controller
{
    /**
     * Lists all groupOfUser entities.
     *
     * @Route("/", name="groupofusers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupOfUsers = $em->getRepository('ABBundle:GroupOfUsers')->findAll();

        return $this->render('groupofusers/index.html.twig', array(
            'groupOfUsers' => $groupOfUsers,
        ));
    }

    /**
     * Creates a new groupOfUser entity.
     *
     * @Route("/new", name="groupofusers_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupOfUser = new Groupofusers();
        $form = $this->createForm('Frisky\AddressBookBundle\Form\GroupOfUsersType', $groupOfUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupOfUser);
            $em->flush($groupOfUser);

            return $this->redirectToRoute('groupofusers_show', array('id' => $groupOfUser->getId()));
        }

        return $this->render('groupofusers/new.html.twig', array(
            'groupOfUser' => $groupOfUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupOfUser entity.
     *
     * @Route("/{id}", name="groupofusers_show")
     * @Method("GET")
     */
    public function showAction(GroupOfUsers $groupOfUser)
    {
        $deleteForm = $this->createDeleteForm($groupOfUser);

        return $this->render('groupofusers/show.html.twig', array(
            'groupOfUser' => $groupOfUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupOfUser entity.
     *
     * @Route("/{id}/edit", name="groupofusers_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GroupOfUsers $groupOfUser)
    {
        $deleteForm = $this->createDeleteForm($groupOfUser);
        $editForm = $this->createForm('Frisky\AddressBookBundle\Form\GroupOfUsersType', $groupOfUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupofusers_edit', array('id' => $groupOfUser->getId()));
        }

        return $this->render('groupofusers/edit.html.twig', array(
            'groupOfUser' => $groupOfUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupOfUser entity.
     *
     * @Route("/{id}", name="groupofusers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GroupOfUsers $groupOfUser)
    {
        $form = $this->createDeleteForm($groupOfUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupOfUser);
            $em->flush($groupOfUser);
        }

        return $this->redirectToRoute('groupofusers_index');
    }

    /**
     * Creates a form to delete a groupOfUser entity.
     *
     * @param GroupOfUsers $groupOfUser The groupOfUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupOfUsers $groupOfUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupofusers_delete', array('id' => $groupOfUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
