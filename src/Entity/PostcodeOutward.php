<?php

namespace BespokeSupport\LocationBundle\Entity;

use Doctrine\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PostcodeOutward
 *
 * @ORM\Table("postcode_outwards", indexes={
 *      @ORM\Index(name="town", columns={"town"}),
 * })
 * @ORM\Entity(repositoryClass="BespokeSupport\LocationBundle\Entity\PostcodeRepository")
 */
class PostcodeOutward
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getPostcodeOutward();
    }
    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=3, nullable=true)
     */
    protected $countryCode;
    /**
     * @var string
     *
     * @ORM\Column(name="country_string", type="string", length=255, nullable=true)
     */
    protected $countryString;
    /**
     * @var integer
     *
     * @ORM\Column(name="eastings", type="integer", options={"unsigned"=true})
     */
    protected $eastings;
    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=18, scale=12)
     */
    protected $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=18, scale=12)
     */
    protected $longitude;
    /**
     * @var integer
     *
     * @ORM\Column(name="northings", type="integer", options={"unsigned"=true})
     */
    protected $northings;
    /**
     * @var string
     *
     * @ORM\Column(name="outward_part", type="string", length=3)
     */
    protected $outwardPart;
    /**
     * @var PostcodeArea
     *
     * @ORM\ManyToOne(targetEntity="PostcodeArea")
     * @ORM\JoinColumn(name="postcode_area", referencedColumnName="postcode_area", nullable=false)
     */
    protected $postcodeArea;
    /**
     * @var string
     *
     * @ORM\Column(name="postcode_outward", type="string", length=4, unique=false)
     * @ORM\Id
     */
    protected $postcodeOutward;
    /**
     * @var string
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    protected $region;

    /**
     * @var boolean
     * @ORM\Column(name="updated", type="boolean", options={"default":false})
     */
    protected $updated = false;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=255, nullable=true)
     */
    protected $town;

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return PostcodeOutward
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryString
     *
     * @return string
     */
    public function getCountryString()
    {
        return $this->countryString;
    }

    /**
     * Set countryString
     *
     * @param string $countryString
     * @return PostcodeOutward
     */
    public function setCountryString($countryString)
    {
        $this->countryString = $countryString;

        return $this;
    }

    /**
     * Get eastings
     *
     * @return integer
     */
    public function getEastings()
    {
        return $this->eastings;
    }

    /**
     * Set eastings
     *
     * @param integer $eastings
     * @return PostcodeOutward
     */
    public function setEastings($eastings)
    {
        $this->eastings = $eastings;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return PostcodeOutward
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return PostcodeOutward
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get northings
     *
     * @return integer
     */
    public function getNorthings()
    {
        return $this->northings;
    }

    /**
     * Set northings
     *
     * @param integer $northings
     * @return PostcodeOutward
     */
    public function setNorthings($northings)
    {
        $this->northings = $northings;

        return $this;
    }

    /**
     * Get outwardPart
     *
     * @return string
     */
    public function getOutwardPart()
    {
        return $this->outwardPart;
    }

    /**
     * Set outwardPart
     *
     * @param string $outwardPart
     * @return PostcodeOutward
     */
    public function setOutwardPart($outwardPart)
    {
        $this->outwardPart = $outwardPart;

        return $this;
    }

    /**
     * @return PostcodeArea
     */
    public function getPostcodeArea()
    {
        return $this->postcodeArea;
    }

    /**
     * @param PostcodeArea $entity
     * @return $this
     */
    public function setPostcodeArea(PostcodeArea $entity)
    {
        $this->postcodeArea = $entity;
        return $this;
    }

    /**
     * Get postcodeOutward
     *
     * @return string
     */
    public function getPostcodeOutward()
    {
        return $this->postcodeOutward;
    }

    /**
     * Set postcodeOutward
     *
     * @param string $postcodeOutward
     * @return PostcodeOutward
     */
    public function setPostcodeOutward($postcodeOutward)
    {
        $this->postcodeOutward = $postcodeOutward;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return PostcodeOutward
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return PostcodeOutward
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isUpdated()
    {
        return $this->updated;
    }

    /**
     * @param boolean $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}
