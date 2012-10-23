<?php

namespace ONetSoc\Impl\Entity\DoctrineORM;

use ONetSoc\Domain\Entity\OccupationInterface;

class Occupation implements OccupationInterface
{
    /**
     * @var integer The ID of the occupation
     */
    private $id;

    /**
     * @var string The occupational code
     */
    private $code;

    /**
     * @var string The title of the occupation
     */
    private $title;

    /**
     * @var string The description of the occupation
     */
    private $description;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }
}
