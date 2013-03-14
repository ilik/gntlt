<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class VuzFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Vuz";
public static $tableName = "vuz";
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

    public function getByPhotoId($photoId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('photoId', $photoId)
        			->fetchAll();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByTitleReduction($titleReduction)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('titleReduction', $titleReduction)
        			->fetchAll();
    }

    public function getByDescription($description)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('description', $description)
        			->fetchAll();
    }

    public function getByYearBase($yearBase)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('yearBase', $yearBase)
        			->fetchAll();
    }

    public function getByAddress($address)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('address', $address)
        			->fetchAll();
    }

    public function getBySite($site)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('site', $site)
        			->fetchAll();
    }

    public function getByPhone($phone)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('phone', $phone)
        			->fetchAll();
    }

    public function getByFax($fax)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('fax', $fax)
        			->fetchAll();
    }

    public function getByEmail($email)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('email', $email)
        			->fetchAll();
    }

    public function getByLicenseNumber($licenseNumber)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('licenseNumber', $licenseNumber)
        			->fetchAll();
    }

    public function getByLicenseOrder($licenseOrder)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('licenseOrder', $licenseOrder)
        			->fetchAll();
    }

    public function getByLicenseAuthority($licenseAuthority)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('licenseAuthority', $licenseAuthority)
        			->fetchAll();
    }

    public function getByLicenseReallyDate($licenseReallyDate)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('licenseReallyDate', $licenseReallyDate)
        			->fetchAll();
    }

    public function getByAccreditationNumber($accreditationNumber)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('accreditationNumber', $accreditationNumber)
        			->fetchAll();
    }

    public function getByAccreditationOrder($accreditationOrder)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('accreditationOrder', $accreditationOrder)
        			->fetchAll();
    }

    public function getByAccreditationAuthority($accreditationAuthority)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('accreditationAuthority', $accreditationAuthority)
        			->fetchAll();
    }

    public function getByAccreditationReallyDate($accreditationReallyDate)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('accreditationReallyDate', $accreditationReallyDate)
        			->fetchAll();
    }

    public function getByTimeCreate($timeCreate)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('timeCreate', $timeCreate)
        			->fetchAll();
    }

    public function getByTimeUpdate($timeUpdate)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('timeUpdate', $timeUpdate)
        			->fetchAll();
    }

    public function getByTypeStructure($typeStructure)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('typeStructure', $typeStructure)
        			->fetchAll();
    }

    public function getByTypeIdVuz($typeIdVuz)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('typeIdVuz', $typeIdVuz)
        			->fetchAll();
    }

    public function getByTypeTitleVuz($typeTitleVuz)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('typeTitleVuz', $typeTitleVuz)
        			->fetchAll();
    }

    public function getByFoundationCourses($foundationCourses)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('foundationCourses', $foundationCourses)
        			->fetchAll();
    }

    public function getByMilitary($military)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('military', $military)
        			->fetchAll();
    }

    public function getByHostel($hostel)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('hostel', $hostel)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
