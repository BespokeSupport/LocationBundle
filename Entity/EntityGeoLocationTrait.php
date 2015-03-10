<?php

namespace BespokeSupport\LocationBundle\Entity;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

trait EntityGeoLocationTrait
{
    /**
     * @var Point
     * @ORM\Column(name="geo", type="point", nullable=true)
     */
    protected $geo;
    /**
     * @var float
     * @ORM\Column(name="latitude", type="decimal", nullable=true, scale=6, precision=10)
     */
    protected $latitude;
    /**
     * @var float
     * @ORM\Column(name="longitude", type="decimal", nullable=true, scale=6, precision=10)
     */
    protected $longitude;

    /**
     * @return Point
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param Point $geo
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}
