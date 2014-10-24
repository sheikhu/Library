<?php
/**
* Created by JetBrains PhpStorm.
* User: sheikhu
* Date: 15/08/13
* Time: 13:02
* To change this template use File | Settings | File Templates.
*/

namespace Sheikhu\LibraryBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    public function sideBar(FactoryInterface $factory)
    {

        $menu = $factory->createItem('root');

        // Home
        $menu->addChild('home', array('route' => 'home', 'label' => 'home'));
        $menu['home']->setAttributes(array('icon' => 'icon-home-2'));

        // livres
        $menu->addChild('livres', array('uri' => '#', 'label' => 'livres'))
            ->setAttributes(array('icon' => 'icon-book', 'domain' => 'livres'));

        $menu['livres']->addChild('livres_list', array('route' => 'livres', 'label' => 'Tous les livres'))
            ->setAttributes(array('domain' => 'livres'));
        $menu['livres']->setChildrenAttribute('class', 'closed');

        $menu['livres']->addChild('livres_new', array(
                'route' => 'livres_new',
                'label' => 'Ajouter un livre')
            );

        $menu->addChild('lecteurs', ['uri' => '#', 'label' => 'Membres'])
                ->setAttributes(['icon' => 'icon-users']);

        $menu['lecteurs']->addChild('inscription', ['uri' => '#', 'label' => 'Inscription']);
        $menu['lecteurs']->setChildrenAttribute('class', 'closed');

        $menu->addChild('prets', array('uri' => '#', 'label' => 'Prets'));
        $menu['prets']->setAttributes(array('icon' => 'icon-bended-arrow-left'));

        $menu['prets']->addChild('liste_prets', ['route' => 'prets', 'label' => 'Tous les prets']);
        $menu['prets']->addChild('pret_new', ['route' => 'prets_new', 'label' => 'Nouveau pret']);
        $menu['prets']->addChild('retours', ['uri' => '#', 'label' => 'Retours']);


        $menu->addChild('stats', ['uri' => '#', 'label' => 'Statistiques'])
            ->setAttributes(['icon' => 'icon-stats']);

        $menu->addChild('parametres', ['uri' => '#', 'label' => 'Paramètres'])
            ->setAttributes(['icon' => 'icon-cogs']);


        /*
        // Commandes
        $menu->addChild('commandes', array('uri' => '#', 'label' => 'Commandes'));
        $menu['commandes']->setAttributes(array('icon' => 'icon-list-2'));

        $menu['commandes']->addChild('commandes_list', array('route' => 'commandes', 'label' => 'Voir les commandes'));
        $menu['commandes']->addChild('commandes_add', array('route' => 'commandes_new', 'label' => 'Ajouter une commande'));


        // Ventes
        $menu->addChild('ventes', array('uri' => '#', 'label' => 'Ventes'));
        $menu['ventes']->setAttributes(array('icon' => 'icon-shopping-cart'));

        $menu['ventes']->addChild('ventes_list', array('route' => 'vente', 'label' => 'Voir les ventes'));
        $menu['ventes']->addChild('ventes_add', array('route' => 'vente_new', 'label' => 'Ajouter une vente'));

        $menu->addChild('stats', array(
            'uri' => '#',
            'label' => 'Statistiques'
            ))->setAttributes(array('icon' => 'icon-stats'));

        $menu->addChild('users', array(
            'uri' => '#',
            'label' => 'Utilisateurs'
            ))->setAttributes(array('icon' => 'icon-users'));

        $menu->addChild('config', array(
            'uri' => '#',
            'label' => 'Configuration'
            ))->setAttributes(array('icon' => 'icon-cogs'));

        //$menu['Messagerie']->addChild('Inbox', array('uri' => '#'));
        //$menu['Messagerie']->addChild('Drafts', array('uri' => '#'));
*/
        return $menu;
    }

}
