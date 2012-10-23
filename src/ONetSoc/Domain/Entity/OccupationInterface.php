<?php

namespace ONetSoc\Domain\Entity;

interface OccupationInterface
{
    /**
     * Get the ID.
     *
     * @return integer
     */
    public function getId();

    /**
     * Set the code of the occupation.
     *
     * @param string $code
     *
     * @return OccupationInterface
     */
    public function setCode($code);

    /**
     * Get the code of the occupation.
     *
     * @return string
     */
    public function getCode();

    /**
     * Set the title.
     *
     * @param string $title
     *
     * @return OccupationInterface
     */
    public function setTitle($title);

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set the description.
     *
     * @param string $description
     *
     * @return OccupationInterface
     */
    public function setDescription($description);

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();
}
