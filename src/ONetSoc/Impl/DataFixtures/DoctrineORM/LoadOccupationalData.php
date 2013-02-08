<?php

namespace ONetSoc\Impl\DataFixtures\DoctrineORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class LoadOccupationalData implements FixtureInterface, OrderedFixtureInterface
{
    private $entityManager;

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $objectManager)
    {
        if (!$objectManager instanceof EntityManager) {
            return false;
        }

        $this->entityManager = $objectManager;

        $sql = file_get_contents(__DIR__ . '/../../Resources/data_fixtures/2012_July_Occupations.sql');

        $conn = $objectManager->getConnection();

        $conn->executeUpdate($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 0;
    }
}
