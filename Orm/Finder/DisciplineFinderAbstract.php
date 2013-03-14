<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class DisciplineFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Discipline";
public static $tableName = "discipline";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByDepartmentId($departmentId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('departmentId', $departmentId)
        			->fetchOne();
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
