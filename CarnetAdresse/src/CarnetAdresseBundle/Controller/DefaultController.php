<?php

namespace CarnetAdresseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use CarnetAdresseBundle\Entity\CarnetAdresse;
use CarnetAdresseBundle\Form\CarnetAdresseType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        $em = $this->getDoctrine()
                   ->getManager();

	$carnets = $em->getRepository('CarnetAdresseBundle:CarnetAdresse')->findAll();
        return $this->render('CarnetAdresseBundle:Default:index.html.twig', 
	array('carnets' => $carnets));
    }
    
    public function createAction(Request $request){
        $user = $this->getUser();
        // Create carnet
        $carnet = new CarnetAdresse();
        
        // Create form
        $form = $this->createForm(new CarnetAdresseType(), $carnet); 
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
                // Get manager
                $em = $this->getDoctrine()
                           ->getManager();
                
                $carnet->setUser($user);

                $em->persist($carnet);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Votre carnet a bien été envoyé.');
                return $this->redirect($this->generateUrl('carnet_adresse_homepage'));
           
        }
            return $this->render('CarnetAdresseBundle:Default:create.html.twig', array(
                'form' => $form->createView()
            ));
    }
    
    public function carnetUserAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()
                   ->getManager();

	$carnets = $em->getRepository('CarnetAdresseBundle:CarnetAdresse')->findByUser(array('user' => $user));
        return $this->render('CarnetAdresseBundle:Default:listeUser.html.twig', 
	array('carnets' => $carnets));
    }
    
    public function carnetEditAction($id){
        $message='';
        $request = $this->get('request');
        
        if (is_null($id)) {
            $postData = $request->get('post');
            $id = $postData['id'];
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $carnet = $em->getRepository('CarnetAdresseBundle:CarnetAdresse')->find($id);
        $form = $this->createForm(new CarnetAdresseType(), $carnet);
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                // perform some action, such as save the object to the database
                $em->persist($carnet);
                $em->flush();
                $message='carnet modifié avec succès !';
                return $this->redirect($this->generateUrl('carnet_adresse_homepage'));
            }
        }
        
        return $this->render('CarnetAdresseBundle:Default:edit.html.twig', array(
            'form' => $form->createView(),
            'message' => $message,
            'carnet' => $carnet,
        ));
    }
    
    public function carnetDeleteAction(CarnetAdresse $carnet){
      
        $em = $this->getDoctrine()
               ->getManager();

        $em->remove($carnet);
        $em->flush(); 

        $carnets = $em->getRepository('CarnetAdresseBundle:CarnetAdresse')->findAll();
        return $this->render('CarnetAdresseBundle:Default:index.html.twig', 
        array('carnets' => $carnets));
        
    }
}
