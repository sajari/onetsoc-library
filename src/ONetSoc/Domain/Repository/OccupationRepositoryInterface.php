<?php

namespace ONetSoc\Domain\Repository;

use ONetSoc\Domain\Entity\OccupationInterface;

interface OccupationRepositoryInterface
{
    /**
     * Find the occupation with the given ID.
     *
     * @param integer $id
     *
     * @return OccupationInterface|null
     */
    public function findOccupation($id);

    /**
     * Find the occupation with the given code.
     *
     * @param string $code
     *
     * @return OccupationInterface|null
     */
    public function findOccupationByCode($code);

    /**
     * Return a collection of occupations.
     *
     * @return OccupationInterface[]
     */
    public function findOccupations();
}
