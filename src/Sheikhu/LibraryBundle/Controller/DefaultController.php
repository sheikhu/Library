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
    public function indexAction()
    {
        $livres = $this->getDoctrine()->getRepository("SheikhuLibraryBundle:Livre")->findAll();
        $em =$this->getDoctrine()->getManager();
        $totalLivres = $em->getRepository("SheikhuLibraryBundle:Livre")->count();
        $totalPrets = count($em->getRepository("SheikhuLibraryBundle:Pret")->findAll());
        $totalMembres = $em->getRepository("SheikhuLibraryBundle:Membre")->count();
        $totalCategories = count($em->getRepository("SheikhuLibraryBundle:Categorie")->findAll());

        return compact('totalLivres', 'totalPrets', 'totalMembres', 'totalCategories');
    }
}
