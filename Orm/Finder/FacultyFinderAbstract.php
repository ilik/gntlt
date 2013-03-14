<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class FacultyFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Faculty";
public static $tableName = "faculty";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
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
