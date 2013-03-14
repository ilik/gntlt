<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class PhotoAlbumFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\PhotoAlbum";
public static $tableName = "photoAlbum";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
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

    public function getByAlbumFace($albumFace)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('albumFace', $albumFace)
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
