<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class IconFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Icon";
public static $tableName = "icon";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByPath($path)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('path', $path)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
