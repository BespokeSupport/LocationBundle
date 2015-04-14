<?php

namespace BespokeSupport\LocationBundle\Service;

use BespokeSupport\Location\Postcode;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\ORM\EntityManager;

/**
 * Class PostcodeService
 * @package BespokeSupport\LocationBundle\Service
 * @method findArea($area)
 * @method findOutward($outward)
 * @method findAllAreas()
 * @method findAllOutwards()
 * @method areaMappedArray()
 * @method outwardMappedArray()
 * @method saveArea()
 * @method saveOutward()
 */
class PostcodeService
{
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var \BespokeSupport\LocationBundle\Entity\PostcodeRepository
     */
    private $repository;

    /**
     * @param Connection    $connection
     * @param EntityManager $entityManager
     * @param               $class
     */
    public function __construct(EntityManager $entityManager, Connection $connection = null)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository('BespokeSupport\LocationBundle\Entity\PostcodeArea');
        $this->connection = ($connection)?:$entityManager->getConnection();
    }

    /**
     * @param $postcode
     * @return Postcode|null
     */
    public function findPostcode($postcode)
    {
        if (!($postcode instanceof Postcode)) {
            $postcode = new Postcode($postcode);
        }

        if (!$postcode || !$postcode->getPostcode()) return null;

        //todo join postcode_outward for town
        $stmt = $this->connection->prepare(
            "
            SELECT
            *
            FROM postcodes
            WHERE postcode = :postcode
            LIMIT 1
            ");
        $stmt->execute(array(
            'postcode' => $postcode->getPostcode()
        ));

        $row = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($row) {
            $postcode->setLatitude($row->latitude);
            $postcode->setLongitude($row->longitude);
            return $postcode;
        }

        return null;

    }


    /**
     * @param $name
     * @param $arguments
     * @return mixed
     *
     */
    public function __call($name, $arguments)
    {
        return $this->repository->$name($arguments);
    }
}
