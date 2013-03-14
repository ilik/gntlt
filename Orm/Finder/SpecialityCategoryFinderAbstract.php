<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class SpecialityCategoryFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\SpecialityCategory";
public static $tableName = "specialityCategory";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByCode($code)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('code', $code)
        			->fetchAll();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
