<?php

namespace ONetSoc\Impl\Repository\DoctrineORM;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use ONetSoc\Domain\Repository\OccupationRepositoryInterface;

class OccupationRepository implements OccupationRepositoryInterface
{
    /**
     * @var string
     */
    private $occupationClass = 'ONetSoc\Impl\Entity\DoctrineORM\Occupation';

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function findOccupation($id)
    {
        $qb = $this->entityManager->createQueryBuilder();

        $qb
            ->select('o')
            ->from($this->occupationClass, 'o')
            ->where('o.id = :id')
            ->setParameter('id', $id);

        $query = $qb->getQuery();

        $query->useResultCache(true, 86400, $this->getCacheId(__METHOD__, $id));

        return $query->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findOccupationByCode($code)
    {
        $qb = $this->entityManager->createQueryBuilder();

        $qb
            ->select('o')
            ->from($this->occupationClass, 'o')
            ->where('o.code = :code')
            ->setParameter('code', $code);

        $query = $qb->getQuery();

        $query->useResultCache(true, 86400, $this->getCacheId(__METHOD__, $code));

        return $query->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findOccupations()
    {
        $qb = $this->entityManager->createQueryBuilder();

        $qb
            ->select('o')
            ->from($this->occupationClass, 'o')
            ->orderBy('o.code', 'asc');

        $query = $qb->getQuery();

        $query->useResultCache(true, 86400, $this->getCacheId(__METHOD__));

        return $query->getResult();
    }

    private function getCacheId($method, $data = '')
    {
        if (null !== $data && '' !== $data) {
            $data = ':' . sha1(serialize($data));
        } else {
            $data = '';
        }

        return str_replace(array('\\', '::', ':'), '_', mb_strtolower($method . $data, mb_detect_encoding($method . $data)));
    }

    /**
     * @return EntityRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository($this->occupationClass);
    }
}
