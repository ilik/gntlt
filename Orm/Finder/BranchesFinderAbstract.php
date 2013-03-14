<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class BranchesFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Branches";
public static $tableName = "branches";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByBrancheTypeId($brancheTypeId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('brancheTypeId', $brancheTypeId)
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
