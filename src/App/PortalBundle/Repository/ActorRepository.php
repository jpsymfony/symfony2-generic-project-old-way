<?php

namespace App\PortalBundle\Repository;

use App\CoreBundle\Repository\AbstractGenericRepository;
use App\PortalBundle\Repository\Interfaces\ActorRepositoryInterface;

class ActorRepository extends AbstractGenericRepository implements ActorRepositoryInterface
{
    public function findByFirstNameOrLastName($motcle)
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->where("a.firstName LIKE :motcle OR a.lastName LIKE :motcle")
            ->orderBy('a.lastName', 'ASC')
            ->setParameter('motcle', '%' . $motcle . '%');
        $query = $qb->getQuery();

        return $query->getResult();
    }
}
