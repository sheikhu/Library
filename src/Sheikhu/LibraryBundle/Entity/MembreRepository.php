<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MembreRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MembreRepository extends EntityRepository
{
    public function count()
    {
        return $this->createQueryBuilder('m')
            ->select("count(m)")
            ->getQuery()->getSingleScalarResult();
    }
}
