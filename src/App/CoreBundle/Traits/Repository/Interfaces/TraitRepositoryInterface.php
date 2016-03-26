<?php

namespace App\CoreBundle\Traits\Repository\Interfaces;

use Doctrine\ORM\Query;

interface TraitRepositoryInterface
{
    /**
     * @return string
     */
    public function getClassName();

    /**
     * Count all fields existed from the given entity 
     *
     * @param boolean $enabled [0, 1]    
     * 
     * @return string the count of all fields.
     * @access public
     */
    public function count($enabled = null);

    /**
     * @param $entity
     */
    public function remove($entity);

    /**
     * Find all translations by an entity.
     *
     * @param string $result = {'array', 'object'}
     * @param int    $MaxResults
     * @param string $orderby
     * @param string $dir
     *
     * @return array|object
     * @access public
     */
    public function findAllByEntity($result = "object", $MaxResults = null, $orderby = '', $dir = 'ASC');

    /**
     * Loads all translations with all translatable fields from the given entity
     *
     * @param Query   $query
     * @param string  $result = {'array', 'object'}
     *
     * @return array|object of result query
     * @access public
     */
    public function findByQuery(Query $query, $result = "array");
}
