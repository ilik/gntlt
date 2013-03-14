<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class SchoolFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\School";
public static $tableName = "school";
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

    public function getByCityId($cityId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('cityId', $cityId)
        			->fetchOne();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByNumber($number)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('number', $number)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
