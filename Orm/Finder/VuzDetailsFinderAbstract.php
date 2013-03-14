<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class VuzDetailsFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\VuzDetails";
public static $tableName = "vuzDetails";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByDescription($description)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('description', $description)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
