<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class DocumentFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Document";
public static $tableName = "document";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByFileId($fileId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('fileId', $fileId)
        			->fetchAll();
    }

    public function getByOwnerId($ownerId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('ownerId', $ownerId)
        			->fetchAll();
    }

    public function getByOwnerType($ownerType)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('ownerType', $ownerType)
        			->fetchAll();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByDescription($description)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('description', $description)
        			->fetchAll();
    }

    public function getByMatherialId($matherialId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('matherialId', $matherialId)
        			->fetchAll();
    }

    public function getByIconId($iconId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('iconId', $iconId)
        			->fetchAll();
    }

    public function getByIconType($iconType)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('iconType', $iconType)
        			->fetchAll();
    }

    public function getByCreated($created)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('created', $created)
        			->fetchAll();
    }

    public function getByUpdated($updated)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('updated', $updated)
        			->fetchAll();
    }

    public function getByDeleted($deleted)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('deleted', $deleted)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
