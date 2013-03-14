<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class VuzStructureFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\VuzStructure";
public static $tableName = "vuzStructure";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByVuzId($vuzId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzId', $vuzId)
        			->fetchOne();
    }

    public function getByVuzStructureId($vuzStructureId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzStructureId', $vuzStructureId)
        			->fetchAll();
    }

    public function getByTableId($tableId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('tableId', $tableId)
        			->fetchAll();
    }

    public function getByItemId($itemId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('itemId', $itemId)
        			->fetchAll();
    }

    public function getByItemTitle($itemTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('itemTitle', $itemTitle)
        			->fetchAll();
    }

    public function getByDetailsId($detailsId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('detailsId', $detailsId)
        			->fetchOne();
    }

    public function getByIsParent($isParent)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('isParent', $isParent)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
