<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class DistrictFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\District";
public static $tableName = "district";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByCountryId($countryId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countryId', $countryId)
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
