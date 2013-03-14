<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class MatterTypeSortFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\MatterTypeSort";
public static $tableName = "matterTypeSort";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByTypeId($typeId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('typeId', $typeId)
        			->fetchAll();
    }

    public function getBySortId($sortId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('sortId', $sortId)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
