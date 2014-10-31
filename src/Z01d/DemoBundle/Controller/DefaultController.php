<?php

namespace Z01d\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Z01dDemoBundle:Default:index.html.twig', array('name' => $name));
    }
}
