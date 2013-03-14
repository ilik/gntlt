<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class MatterSortFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\MatterSort";
public static $tableName = "matterSort";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByMatterTypeId($matterTypeId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('matterTypeId', $matterTypeId)
        			->fetchOne();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByIcon($icon)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('icon', $icon)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
