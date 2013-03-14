<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class DepartmentFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Department";
public static $tableName = "department";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByName($name)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('name', $name)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
