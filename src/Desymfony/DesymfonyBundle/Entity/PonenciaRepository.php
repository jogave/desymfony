<?php

namespace Desymfony\DesymfonyBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PonenciaRepository extends EntityRepository
{
    public function findTodasDeFecha($fecha)
    {
        $em = $this->getEntityManager();

        $query = $em->createQueryBuilder()
            ->select('p')
            ->from('DesymfonyBundle:Ponencia', 'p')
            ->where('p.fecha = :fecha')
            ->orderBy('p.fecha', 'ASC')
            ->setParameter('fecha', new \DateTime($fecha), \Doctrine\DBAL\Types\Type::DATETIME)
            ->getQuery();

        return $query->getResult();
    }

}
