<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\User\UserFinder;
use Orm\Finder\Country\CountryFinder;
use Orm\Finder\District\DistrictFinder;
use Orm\Finder\Region\RegionFinder;
use Orm\Finder\City\CityFinder;
use Orm\Finder\School\SchoolFinder;

class MySchoolAbstract extends ModelAbstract
{

    private $id = null;

    private $userId = null;

    private $user = null;

    private $countryId = null;

    private $country = null;

    private $districtId = null;

    private $district = null;

    private $regionId = null;

    private $region = null;

    private $cityId = null;

    private $city = null;

    private $schoolId = null;

    private $school = null;

    private $titleSchool = null;

    private $numberSchool = null;

    private $dateSupply = null;

    private $dateEnd = null;

    private $dateIssue = null;

    private $grade = null;

    private $specialization = null;

    private $medal = null;

    private $date = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUser()
    {
        return \Yii::app()->orm->getOrm()->getUserFinder()->getById($this->getUserId());
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

    public function getSchoolId()
    {
        return $this->schoolId;
    }

    public function setSchoolId($schoolId)
    {
        $this->schoolId = $schoolId;
        return $this;
    }

    public function getSchool()
    {
        return \Yii::app()->orm->getOrm()->getSchoolFinder()->getById($this->getSchoolId());
    }

    public function getTitleSchool()
    {
        return $this->titleSchool;
    }

    public function setTitleSchool($titleSchool)
    {
        $this->titleSchool = $titleSchool;
        return $this;
    }

    public function getNumberSchool()
    {
        return $this->numberSchool;
    }

    public function setNumberSchool($numberSchool)
    {
        $this->numberSchool = $numberSchool;
        return $this;
    }

    public function getDateSupply()
    {
        return $this->dateSupply;
    }

    public function setDateSupply($dateSupply)
    {
        $this->dateSupply = $dateSupply;
        return $this;
    }

    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    public function getDateIssue()
    {
        return $this->dateIssue;
    }

    public function setDateIssue($dateIssue)
    {
        $this->dateIssue = $dateIssue;
        return $this;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
        return $this;
    }

    public function getSpecialization()
    {
        return $this->specialization;
    }

    public function setSpecialization($specialization)
    {
        $this->specialization = $specialization;
        return $this;
    }

    public function getMedal()
    {
        return $this->medal;
    }

    public function setMedal($medal)
    {
        $this->medal = $medal;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function tableName()
    {
        return 'myschool';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "userId" => $this->getUserId(),
        "countryId" => $this->getCountryId(),
        "districtId" => $this->getDistrictId(),
        "regionId" => $this->getRegionId(),
        "cityId" => $this->getCityId(),
        "schoolId" => $this->getSchoolId(),
        "titleSchool" => $this->getTitleSchool(),
        "numberSchool" => $this->getNumberSchool(),
        "dateSupply" => $this->getDateSupply(),
        "dateEnd" => $this->getDateEnd(),
        "dateIssue" => $this->getDateIssue(),
        "grade" => $this->getGrade(),
        "specialization" => $this->getSpecialization(),
        "medal" => $this->getMedal(),
        "date" => $this->getDate()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "user" => $this->getUser()->asArray(),
        "country" => $this->getCountry()->asArray(),
        "district" => $this->getDistrict()->asArray(),
        "region" => $this->getRegion()->asArray(),
        "city" => $this->getCity()->asArray(),
        "school" => $this->getSchool()->asArray(),
        "titleSchool" => $this->getTitleSchool(),
        "numberSchool" => $this->getNumberSchool(),
        "dateSupply" => $this->getDateSupply(),
        "dateEnd" => $this->getDateEnd(),
        "dateIssue" => $this->getDateIssue(),
        "grade" => $this->getGrade(),
        "specialization" => $this->getSpecialization(),
        "medal" => $this->getMedal(),
        "date" => $this->getDate()
        );
    }


}
