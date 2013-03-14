<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class RegionFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Region";
public static $tableName = "region";
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

    public function getByDistrictId($districtId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('districtId', $districtId)
        			->fetchOne();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByCountryIdAndDistrictId($countryId, $districtId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countryId', $countryId)
        			->eq('districtId', $districtId)
        			->fetchOne();
    }

    public function getBuilder()
    {
        return $this;
    }


}
