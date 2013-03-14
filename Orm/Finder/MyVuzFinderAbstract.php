<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class MyVuzFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\MyVuz";
public static $tableName = "myVuz";
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

    public function getByVuzId($vuzId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzId', $vuzId)
        			->fetchOne();
    }

    public function getByVuzTitle($vuzTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzTitle', $vuzTitle)
        			->fetchAll();
    }

    public function getByInstituteId($instituteId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('instituteId', $instituteId)
        			->fetchOne();
    }

    public function getByInstituteTitle($instituteTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('instituteTitle', $instituteTitle)
        			->fetchAll();
    }

    public function getByAcademyId($academyId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('academyId', $academyId)
        			->fetchOne();
    }

    public function getByAcademyTitle($academyTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('academyTitle', $academyTitle)
        			->fetchAll();
    }

    public function getByFacultyId($facultyId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('facultyId', $facultyId)
        			->fetchOne();
    }

    public function getByFacultyTitle($facultyTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('facultyTitle', $facultyTitle)
        			->fetchAll();
    }

    public function getByChairId($chairId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('chairId', $chairId)
        			->fetchOne();
    }

    public function getByChairTitle($chairTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('chairTitle', $chairTitle)
        			->fetchAll();
    }

    public function getByGroupTitle($groupTitle)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('groupTitle', $groupTitle)
        			->fetchAll();
    }

    public function getByDateStart($dateStart)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('dateStart', $dateStart)
        			->fetchAll();
    }

    public function getByDateStop($dateStop)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('dateStop', $dateStop)
        			->fetchAll();
    }

    public function getByMedal($medal)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('medal', $medal)
        			->fetchAll();
    }

    public function getByStatus($status)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('status', $status)
        			->fetchAll();
    }

    public function getByDeleted($deleted)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('deleted', $deleted)
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
