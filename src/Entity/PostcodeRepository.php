<?php

namespace BespokeSupport\LocationBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class PostcodeRepository
 * @package BespokeSupport\LocationBundle\Entity
 */
class PostcodeRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function areaMappedArray()
    {
        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeArea';
        /**
         * @var $entities PostcodeArea[]
         */
        $entities = $this->findAll();
        $entitiesIdMap = [];
        foreach ($entities as $key => $entity) {
            $entitiesIdMap[$entity->getPostcodeArea()] = $entity;
        }
        return $entitiesIdMap;
    }

    /**
     * @return array
     */
    public function outwardMappedArray()
    {
        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeOutward';
        /**
         * @var $entities PostcodeOutward[]
         */
        $entities = $this->findAll();
        $entitiesIdMap = [];
        foreach ($entities as $key => $entity) {
            $entitiesIdMap[$entity->getPostcodeOutward()] = $entity;
        }
        return $entitiesIdMap;
    }

    /**
     * @param $area
     * @return null|PostcodeArea
     */
    public function findArea($area)
    {
        if (is_array($area)) $area = $area[0];
        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeArea';
        return $this->findOneBy(['postcodeArea' => $area]);
    }

    /**
     * @param $outward
     * @return PostcodeOutward|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @internal param PostcodeOutward $postcodeOutward
     */
    public function findOutward($outward)
    {
        if (is_array($outward)) $outward = $outward[0];

        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeOutward';

        $queryBuilder = $this->createQueryBuilder('o');

        $queryBuilder->where('o.postcodeOutward = :outward');

        $queryBuilder->setParameter('outward', $outward);

        $q = $queryBuilder->getQuery();

        $postcodeOutward = $q->getOneOrNullResult();

        return $postcodeOutward;
    }

    /**
     * @param $area
     * @return PostcodeOutward[]
     */
    public function findOutwardsForArea($area)
    {
        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeOutward';

        $queryBuilder = $this->createQueryBuilder('o');

        $queryBuilder->where('o.postcodeArea = :outward');

        $queryBuilder->setParameter('area', $area);

        $queryBuilder->orderBy('o.outwardPart', 'ASC');

        $q = $queryBuilder->getQuery();

        $outwards = $q->getResult();

        return $outwards;
    }

    /**
     * @return PostcodeArea[]
     */
    public function findAllAreas()
    {
        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeArea';
        $queryBuilder = $this->createQueryBuilder('postcodeArea');
        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @return PostcodeOutward[]
     */
    public function findAllOutwards()
    {
        $this->_entityName = 'BespokeSupport\LocationBundle\Entity\PostcodeOutward';
        $queryBuilder = $this->createQueryBuilder('postcodeOutward');
        return $queryBuilder->getQuery()->getResult();
    }


    /**
     * @param PostcodeArea $entity
     * @return PostcodeArea
     */
    public function saveArea(PostcodeArea $entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();
        return $entity;
    }

    /**
     * @param PostcodeOutward $entity
     * @return PostcodeOutward
     */
    public function saveOutward(PostcodeOutward $entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();
        return $entity;
    }
}
