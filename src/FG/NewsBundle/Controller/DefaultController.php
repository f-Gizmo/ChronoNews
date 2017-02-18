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
    	$datecourrante = new \DateTime;
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
        	'datecourrante' =>$datecourrante
        	));
    }
    public function addAction(Request $request)
    {
    	$serviceSpam =$this->container->get('fg_news.antispam');
    	$newsletter = new Newsletter;
    	$form = $this->createForm(NewsletterType::class , $newsletter);

    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
    	{
    		if ($serviceSpam->isSpam($newsletter->getTitre()))
    		{
    			throw new \Exception("Titre Trop Court");
    			
    		}
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($newsletter);
    		$em->flush();
    		return $this->redirectToRoute('fg_news_homepage');
    	}

    	

    	return $this->render('FGNewsBundle:Default:addNews.html.twig', array(
    		'form' => $form->createView(),
     		));
    }
    public function futurNewsAction()
    {
    	$em=$this->getDoctrine()->getManager();
    	$newsletters= $em->getRepository('FGNewsBundle:Newsletter')->getFuturNews();
        return $this->render('FGNewsBundle:Default:futursNews.html.twig', array(
        	'Newsletters' => $newsletters,));
    }
}
