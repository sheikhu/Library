<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 05/10/14
 * Time: 18:57
 */

namespace Sheikhu\UserBundle;


use Symfony\Component\HttpKernel\Bundle\Bundle;

class SheikhuUserBundle extends Bundle {

    public function getParent()
    {
        return "FOSUserBundle";
    }


} 