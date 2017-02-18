<?php

namespace FG\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FG\NewsBundle\Entity\Newsletter;
use FG\NewsBundle\Form\NewsletterType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
    	$limite=5;
    	$em=$this->getDoctrine()->getManager();
    	$newsletters= $em->getRepository('FGNewsBundle:Newsletter')->findBy(
    		array(),
    		array('date'=>'desc'),
    		$limite,
    		0
    		);
        return $this->render('FGNewsBundle:Default:index.html.twig', array(
        	'Newsletters' => $newsletters,
        	'limite' => $limite,
        	));
    }
    public function addAction(Request $request)
    {
    	$newsletter = new Newsletter;
    	$form = $this->createForm(NewsletterType::class , $newsletter);

    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
    	{
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($newsletter);
    		$em->flush();
    		return $this->redirectToRoute('fg_news_homepage');
    	}

    	

    	return $this->render('FGNewsBundle:Default:addNews.html.twig', array(
    		'form' => $form->createView(),
     		));
    }
}
