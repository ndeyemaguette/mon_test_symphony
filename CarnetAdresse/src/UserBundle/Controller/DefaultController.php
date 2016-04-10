<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use UserBundle\Form\UserType;

class DefaultController extends Controller
{
    /**
    * @Secure(roles="ROLE_ADMIN")
    */
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }
    
     public function editInfosAction(){
        $message = '';
        $user = $this->getUser();
        $request = $this->get('request');
        
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new UserType(), $user);
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                // perform some action, such as save the object to the database
                $em->persist($user);
                $em->flush();
                $message='Informations modifié avec succès !';
                return $this->redirect($this->generateUrl('carnet_adresse_homepage'));
            }
        }
        
        return $this->render('UserBundle:Default:edit.html.twig', array(
            'form' => $form->createView(),
            'message' => $message,
            'user' => $user,
        ));
    }
    
}
