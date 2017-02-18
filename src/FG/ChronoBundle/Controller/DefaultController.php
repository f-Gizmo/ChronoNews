<?php

namespace FG\ChronoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FGChronoBundle:Default:index.html.twig');
    }
}
