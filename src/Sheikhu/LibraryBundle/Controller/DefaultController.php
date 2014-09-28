<?php

namespace Sheikhu\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SheikhuLibraryBundle:Default:index.html.twig', array('name' => $name));
    }
}
