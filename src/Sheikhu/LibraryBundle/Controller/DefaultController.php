<?php

namespace Sheikhu\LibraryBundle\Controller;

use Faker\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction($name)
    {
        $data = $this->getDoctrine()->getRepository("SheikhuLibraryBundle:Livre")->findAll();
        return compact('name', 'data');
    }
}
