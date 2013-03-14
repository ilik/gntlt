<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class MatterTypeFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\MatterType";
public static $tableName = "matterType";
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
