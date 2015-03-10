<?php

namespace BespokeSupport\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PostcodeArea
 *
 * @ORM\Table("postcode_areas")
 * @ORM\Entity(repositoryClass="BespokeSupport\LocationBundle\Entity\PostcodeRepository")
 */
class PostcodeArea
{
    /**
     * @var string
     *
     * @ORM\Column(name="postcode_area", type="string", length=2, unique=true)
     * @ORM\Id
     */
    protected $postcodeArea;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->postcodeArea;
    }

    /**
     * Get postcodeArea
     *
     * @return string
     */
    public function getPostcodeArea()
    {
        return $this->postcodeArea;
    }

    /**
     * Set postcodeArea
     *
     * @param string $postcodeArea
     * @return PostcodeArea
     */
    public function setPostcodeArea($postcodeArea)
    {
        $this->postcodeArea = $postcodeArea;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getPostcodeArea();
    }
}
