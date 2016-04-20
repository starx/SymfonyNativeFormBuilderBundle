<?php

namespace Starx\SymfonyNativeFormBuilderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StarxSymfonyNativeFormBuilderBundle:Default:index.html.twig');
    }
}
