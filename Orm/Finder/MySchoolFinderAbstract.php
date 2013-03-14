<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class MySchoolFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\MySchool";
public static $tableName = "mySchool";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByUserId($userId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('userId', $userId)
        			->fetchOne();
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

    public function getBySchoolId($schoolId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('schoolId', $schoolId)
        			->fetchOne();
    }

    public function getByTitleSchool($titleSchool)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('titleSchool', $titleSchool)
        			->fetchAll();
    }

    public function getByNumberSchool($numberSchool)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('numberSchool', $numberSchool)
        			->fetchAll();
    }

    public function getByDateSupply($dateSupply)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('dateSupply', $dateSupply)
        			->fetchAll();
    }

    public function getByDateEnd($dateEnd)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('dateEnd', $dateEnd)
        			->fetchAll();
    }

    public function getByDateIssue($dateIssue)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('dateIssue', $dateIssue)
        			->fetchAll();
    }

    public function getByGrade($grade)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('grade', $grade)
        			->fetchAll();
    }

    public function getBySpecialization($specialization)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('specialization', $specialization)
        			->fetchAll();
    }

    public function getByMedal($medal)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('medal', $medal)
        			->fetchAll();
    }

    public function getByDate($date)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('date', $date)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
