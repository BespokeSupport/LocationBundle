<?php

namespace BespokeSupport\LocationBundle\Entity;

use BespokeSupport\Location\Postcode;

/**
 * Class EntityPostcodeTrait
 * @package BespokeSupport\LocationBundle\Entity
 */
trait EntityPostcodeTrait
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="postcode", type="string", length=255, nullable=false)
     */
    protected $postcode;
    /**
     * @var PostcodeOutward
     * @ORM\ManyToOne(targetEntity="BespokeSupport\LocationBundle\Entity\PostcodeOutward", cascade={"detach"})
     * @ORM\JoinColumn(name="postcode_outward", referencedColumnName="postcode_outward", nullable=false)
     */
    protected $postcodeOutward;
    /**
     * Get postcode
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     */
    public function setPostcode($postcode)
    {
        $postcodeObject = new Postcode($postcode);

        $this->postcode = $postcodeObject->getPostcode();
    }

    /**
     * @return PostcodeArea
     */
    public function getPostcodeArea()
    {
        $outward = $this->getPostcodeOutward();

        if (!$outward) return null;

        return $outward->getPostcodeArea();
    }

    /**
     * @return PostcodeOutward
     */
    public function getPostcodeOutward()
    {
        return $this->postcodeOutward;
    }

    /**
     * @param PostcodeOutward $entity
     * @return $this
     */
    public function setPostcodeOutward(PostcodeOutward $entity)
    {
        $this->postcodeOutward = $entity;
    }
}
