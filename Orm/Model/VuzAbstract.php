<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Country\CountryFinder;
use Orm\Finder\District\DistrictFinder;
use Orm\Finder\Region\RegionFinder;
use Orm\Finder\City\CityFinder;

class VuzAbstract extends ModelAbstract
{

    private $id = null;

    private $countryId = null;

    private $country = null;

    private $districtId = null;

    private $district = null;

    private $regionId = null;

    private $region = null;

    private $cityId = null;

    private $city = null;

    private $photoId = null;

    private $title = null;

    private $titleReduction = null;

    private $description = null;

    private $yearBase = null;

    private $address = null;

    private $site = null;

    private $phone = null;

    private $fax = null;

    private $email = null;

    private $licenseNumber = null;

    private $licenseOrder = null;

    private $licenseAuthority = null;

    private $licenseReallyDate = null;

    private $accreditationNumber = null;

    private $accreditationOrder = null;

    private $accreditationAuthority = null;

    private $accreditationReallyDate = null;

    private $timeCreate = null;

    private $timeUpdate = null;

    private $typeStructure = null;

    private $typeIdVuz = null;

    private $typeTitleVuz = null;

    private $foundationCourses = null;

    private $military = null;

    private $hostel = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCountryId()
    {
        return $this->countryId;
    }

    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function getCountry()
    {
        return \Yii::app()->orm->getOrm()->getCountryFinder()->getById($this->getCountryId());
    }

    public function getDistrictId()
    {
        return $this->districtId;
    }

    public function setDistrictId($districtId)
    {
        $this->districtId = $districtId;
        return $this;
    }

    public function getDistrict()
    {
        return \Yii::app()->orm->getOrm()->getDistrictFinder()->getById($this->getDistrictId());
    }

    public function getRegionId()
    {
        return $this->regionId;
    }

    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;
        return $this;
    }

    public function getRegion()
    {
        return \Yii::app()->orm->getOrm()->getRegionFinder()->getById($this->getRegionId());
    }

    public function getCityId()
    {
        return $this->cityId;
    }

    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
        return $this;
    }

    public function getCity()
    {
        return \Yii::app()->orm->getOrm()->getCityFinder()->getById($this->getCityId());
    }

    public function getPhotoId()
    {
        return $this->photoId;
    }

    public function setPhotoId($photoId)
    {
        $this->photoId = $photoId;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitleReduction()
    {
        return $this->titleReduction;
    }

    public function setTitleReduction($titleReduction)
    {
        $this->titleReduction = $titleReduction;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getYearBase()
    {
        return $this->yearBase;
    }

    public function setYearBase($yearBase)
    {
        $this->yearBase = $yearBase;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getLicenseNumber()
    {
        return $this->licenseNumber;
    }

    public function setLicenseNumber($licenseNumber)
    {
        $this->licenseNumber = $licenseNumber;
        return $this;
    }

    public function getLicenseOrder()
    {
        return $this->licenseOrder;
    }

    public function setLicenseOrder($licenseOrder)
    {
        $this->licenseOrder = $licenseOrder;
        return $this;
    }

    public function getLicenseAuthority()
    {
        return $this->licenseAuthority;
    }

    public function setLicenseAuthority($licenseAuthority)
    {
        $this->licenseAuthority = $licenseAuthority;
        return $this;
    }

    public function getLicenseReallyDate()
    {
        return $this->licenseReallyDate;
    }

    public function setLicenseReallyDate($licenseReallyDate)
    {
        $this->licenseReallyDate = $licenseReallyDate;
        return $this;
    }

    public function getAccreditationNumber()
    {
        return $this->accreditationNumber;
    }

    public function setAccreditationNumber($accreditationNumber)
    {
        $this->accreditationNumber = $accreditationNumber;
        return $this;
    }

    public function getAccreditationOrder()
    {
        return $this->accreditationOrder;
    }

    public function setAccreditationOrder($accreditationOrder)
    {
        $this->accreditationOrder = $accreditationOrder;
        return $this;
    }

    public function getAccreditationAuthority()
    {
        return $this->accreditationAuthority;
    }

    public function setAccreditationAuthority($accreditationAuthority)
    {
        $this->accreditationAuthority = $accreditationAuthority;
        return $this;
    }

    public function getAccreditationReallyDate()
    {
        return $this->accreditationReallyDate;
    }

    public function setAccreditationReallyDate($accreditationReallyDate)
    {
        $this->accreditationReallyDate = $accreditationReallyDate;
        return $this;
    }

    public function getTimeCreate()
    {
        return $this->timeCreate;
    }

    public function setTimeCreate($timeCreate)
    {
        $this->timeCreate = $timeCreate;
        return $this;
    }

    public function getTimeUpdate()
    {
        return $this->timeUpdate;
    }

    public function setTimeUpdate($timeUpdate)
    {
        $this->timeUpdate = $timeUpdate;
        return $this;
    }

    public function getTypeStructure()
    {
        return $this->typeStructure;
    }

    public function setTypeStructure($typeStructure)
    {
        $this->typeStructure = $typeStructure;
        return $this;
    }

    public function getTypeIdVuz()
    {
        return $this->typeIdVuz;
    }

    public function setTypeIdVuz($typeIdVuz)
    {
        $this->typeIdVuz = $typeIdVuz;
        return $this;
    }

    public function getTypeTitleVuz()
    {
        return $this->typeTitleVuz;
    }

    public function setTypeTitleVuz($typeTitleVuz)
    {
        $this->typeTitleVuz = $typeTitleVuz;
        return $this;
    }

    public function getFoundationCourses()
    {
        return $this->foundationCourses;
    }

    public function setFoundationCourses($foundationCourses)
    {
        $this->foundationCourses = $foundationCourses;
        return $this;
    }

    public function getMilitary()
    {
        return $this->military;
    }

    public function setMilitary($military)
    {
        $this->military = $military;
        return $this;
    }

    public function getHostel()
    {
        return $this->hostel;
    }

    public function setHostel($hostel)
    {
        $this->hostel = $hostel;
        return $this;
    }

    public function tableName()
    {
        return 'vuz';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "countryId" => $this->getCountryId(),
        "districtId" => $this->getDistrictId(),
        "regionId" => $this->getRegionId(),
        "cityId" => $this->getCityId(),
        "photoId" => $this->getPhotoId(),
        "title" => $this->getTitle(),
        "titleReduction" => $this->getTitleReduction(),
        "description" => $this->getDescription(),
        "yearBase" => $this->getYearBase(),
        "address" => $this->getAddress(),
        "site" => $this->getSite(),
        "phone" => $this->getPhone(),
        "fax" => $this->getFax(),
        "email" => $this->getEmail(),
        "licenseNumber" => $this->getLicenseNumber(),
        "licenseOrder" => $this->getLicenseOrder(),
        "licenseAuthority" => $this->getLicenseAuthority(),
        "licenseReallyDate" => $this->getLicenseReallyDate(),
        "accreditationNumber" => $this->getAccreditationNumber(),
        "accreditationOrder" => $this->getAccreditationOrder(),
        "accreditationAuthority" => $this->getAccreditationAuthority(),
        "accreditationReallyDate" => $this->getAccreditationReallyDate(),
        "timeCreate" => $this->getTimeCreate(),
        "timeUpdate" => $this->getTimeUpdate(),
        "typeStructure" => $this->getTypeStructure(),
        "typeIdVuz" => $this->getTypeIdVuz(),
        "typeTitleVuz" => $this->getTypeTitleVuz(),
        "foundationCourses" => $this->getFoundationCourses(),
        "military" => $this->getMilitary(),
        "hostel" => $this->getHostel()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "country" => $this->getCountry()->asArray(),
        "district" => $this->getDistrict()->asArray(),
        "region" => $this->getRegion()->asArray(),
        "city" => $this->getCity()->asArray(),
        "photoId" => $this->getPhotoId(),
        "title" => $this->getTitle(),
        "titleReduction" => $this->getTitleReduction(),
        "description" => $this->getDescription(),
        "yearBase" => $this->getYearBase(),
        "address" => $this->getAddress(),
        "site" => $this->getSite(),
        "phone" => $this->getPhone(),
        "fax" => $this->getFax(),
        "email" => $this->getEmail(),
        "licenseNumber" => $this->getLicenseNumber(),
        "licenseOrder" => $this->getLicenseOrder(),
        "licenseAuthority" => $this->getLicenseAuthority(),
        "licenseReallyDate" => $this->getLicenseReallyDate(),
        "accreditationNumber" => $this->getAccreditationNumber(),
        "accreditationOrder" => $this->getAccreditationOrder(),
        "accreditationAuthority" => $this->getAccreditationAuthority(),
        "accreditationReallyDate" => $this->getAccreditationReallyDate(),
        "timeCreate" => $this->getTimeCreate(),
        "timeUpdate" => $this->getTimeUpdate(),
        "typeStructure" => $this->getTypeStructure(),
        "typeIdVuz" => $this->getTypeIdVuz(),
        "typeTitleVuz" => $this->getTypeTitleVuz(),
        "foundationCourses" => $this->getFoundationCourses(),
        "military" => $this->getMilitary(),
        "hostel" => $this->getHostel()
        );
    }


}
