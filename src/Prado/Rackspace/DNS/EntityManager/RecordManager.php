<?php

namespace Prado\Rackspace\DNS\EntityManager;


use DateTime;
use Prado\Rackspace\DNS\Http\RestInterface;
use Prado\Rackspace\DNS\Entity\AsynchResponse;
use Prado\Rackspace\DNS\Entity\Domain;
use Prado\Rackspace\DNS\Entity\Record;
use Prado\Rackspace\DNS\Entity\RecordList;
use Prado\Rackspace\DNS\Hydrator;
use Prado\Rackspace\DNS\Entity;
use Prado\Rackspace\DNS\EntityManager;

class RecordManager implements EntityManager
{
    /**
     * @var Prado\Rackspace\DNS\Http\RestInterface
     */
    protected $_api;
    
    /**
     * @var Prado\Rackspace\DNS\Hydrator
     */
    protected $_hydrator;
    
    /**
     * @var Prado\Rackspace\DNS\Entity\Domain
     */
    protected $_domain;
    
    /**
     * Constructor.
     * 
     * @param Prado\Rackspace\Http\RestInterface $apit
     * @param Prado\Rackspace\DNS\Hydrator       $hydrator
     */
    public function __construct(RestInterface $api, Hydrator $hydrator, Domain $domain)
    {
        $this->_api      = $api;
        $this->_hydrator = $hydrator;
        $this->_domain   = $domain;
    }
    
    public function create(Entity $entity)
    {
        
    }
    
    public function remove(Entity $entity)
    {
        
    }
    
    public function update(Entity $entity)
    {
        
    }
    
    public function refresh(Entity $entity)
    {
        
    }
    
    public function find($id)
    {
        $data = $this->_api->get(sprintf('/domains/%s/records/%s', $this->_domain->getId(), $id));
        
        $entity = new Record;
        $this->_hydrator->hydrateEntity($entity, $data);
        
        return $entity;
    }
    
    public function createList()
    {
        $data = $this->_api->get(sprintf('/domains/%s/records', $this->_domain->getId()));
        
        $entity = new Record;
        $this->_hydrator->hydrateEntity($entity, $data);
        
        return $entity;
    }
}
