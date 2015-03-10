<?php

namespace BespokeSupport\LocationBundle\Service;

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
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var \BespokeSupport\LocationBundle\Entity\PostcodeRepository
     */
    private $repository;

    /**
     * @param EntityManager $entityManager
     * @param               $class
     */
    public function __construct(EntityManager $entityManager, $class)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository($class);
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
