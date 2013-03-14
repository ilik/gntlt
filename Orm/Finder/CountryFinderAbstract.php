<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class CountryFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Country";
public static $tableName = "country";
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
