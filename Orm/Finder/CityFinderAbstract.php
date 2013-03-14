<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class CityFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\City";
public static $tableName = "city";
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

    public function getByRegionId($regionId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('regionId', $regionId)
        			->fetchOne();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByCountryIdAndDistrictIdAndRegionId($countryId, $districtId, $regionId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countryId', $countryId)
        			->eq('districtId', $districtId)
        			->eq('regionId', $regionId)
        			->fetchOne();
    }

    public function getBuilder()
    {
        return $this;
    }


}
