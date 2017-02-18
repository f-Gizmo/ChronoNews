<?php

namespace FG\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FGUserBundle:Default:index.html.twig');
    }
}
