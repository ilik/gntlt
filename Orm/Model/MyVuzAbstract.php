<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Country\CountryFinder;
use Orm\Finder\District\DistrictFinder;
use Orm\Finder\Region\RegionFinder;
use Orm\Finder\City\CityFinder;
use Orm\Finder\Vuz\VuzFinder;
use Orm\Finder\Institute\InstituteFinder;
use Orm\Finder\Academy\AcademyFinder;
use Orm\Finder\Faculty\FacultyFinder;
use Orm\Finder\Chair\ChairFinder;

class MyVuzAbstract extends ModelAbstract
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

    private $vuzId = null;

    private $vuz = null;

    private $vuzTitle = null;

    private $instituteId = null;

    private $institute = null;

    private $instituteTitle = null;

    private $academyId = null;

    private $academy = null;

    private $academyTitle = null;

    private $facultyId = null;

    private $faculty = null;

    private $facultyTitle = null;

    private $chairId = null;

    private $chair = null;

    private $chairTitle = null;

    private $groupTitle = null;

    private $dateStart = null;

    private $dateStop = null;

    private $medal = null;

    private $status = null;

    private $deleted = null;

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

    public function getVuzId()
    {
        return $this->vuzId;
    }

    public function setVuzId($vuzId)
    {
        $this->vuzId = $vuzId;
        return $this;
    }

    public function getVuz()
    {
        return \Yii::app()->orm->getOrm()->getVuzFinder()->getById($this->getVuzId());
    }

    public function getVuzTitle()
    {
        return $this->vuzTitle;
    }

    public function setVuzTitle($vuzTitle)
    {
        $this->vuzTitle = $vuzTitle;
        return $this;
    }

    public function getInstituteId()
    {
        return $this->instituteId;
    }

    public function setInstituteId($instituteId)
    {
        $this->instituteId = $instituteId;
        return $this;
    }

    public function getInstitute()
    {
        return \Yii::app()->orm->getOrm()->getInstituteFinder()->getById($this->getInstituteId());
    }

    public function getInstituteTitle()
    {
        return $this->instituteTitle;
    }

    public function setInstituteTitle($instituteTitle)
    {
        $this->instituteTitle = $instituteTitle;
        return $this;
    }

    public function getAcademyId()
    {
        return $this->academyId;
    }

    public function setAcademyId($academyId)
    {
        $this->academyId = $academyId;
        return $this;
    }

    public function getAcademy()
    {
        return \Yii::app()->orm->getOrm()->getAcademyFinder()->getById($this->getAcademyId());
    }

    public function getAcademyTitle()
    {
        return $this->academyTitle;
    }

    public function setAcademyTitle($academyTitle)
    {
        $this->academyTitle = $academyTitle;
        return $this;
    }

    public function getFacultyId()
    {
        return $this->facultyId;
    }

    public function setFacultyId($facultyId)
    {
        $this->facultyId = $facultyId;
        return $this;
    }

    public function getFaculty()
    {
        return \Yii::app()->orm->getOrm()->getFacultyFinder()->getById($this->getFacultyId());
    }

    public function getFacultyTitle()
    {
        return $this->facultyTitle;
    }

    public function setFacultyTitle($facultyTitle)
    {
        $this->facultyTitle = $facultyTitle;
        return $this;
    }

    public function getChairId()
    {
        return $this->chairId;
    }

    public function setChairId($chairId)
    {
        $this->chairId = $chairId;
        return $this;
    }

    public function getChair()
    {
        return \Yii::app()->orm->getOrm()->getChairFinder()->getById($this->getChairId());
    }

    public function getChairTitle()
    {
        return $this->chairTitle;
    }

    public function setChairTitle($chairTitle)
    {
        $this->chairTitle = $chairTitle;
        return $this;
    }

    public function getGroupTitle()
    {
        return $this->groupTitle;
    }

    public function setGroupTitle($groupTitle)
    {
        $this->groupTitle = $groupTitle;
        return $this;
    }

    public function getDateStart()
    {
        return $this->dateStart;
    }

    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
        return $this;
    }

    public function getDateStop()
    {
        return $this->dateStop;
    }

    public function setDateStop($dateStop)
    {
        $this->dateStop = $dateStop;
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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
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
        return 'myvuz';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "countryId" => $this->getCountryId(),
        "districtId" => $this->getDistrictId(),
        "regionId" => $this->getRegionId(),
        "cityId" => $this->getCityId(),
        "vuzId" => $this->getVuzId(),
        "vuzTitle" => $this->getVuzTitle(),
        "instituteId" => $this->getInstituteId(),
        "instituteTitle" => $this->getInstituteTitle(),
        "academyId" => $this->getAcademyId(),
        "academyTitle" => $this->getAcademyTitle(),
        "facultyId" => $this->getFacultyId(),
        "facultyTitle" => $this->getFacultyTitle(),
        "chairId" => $this->getChairId(),
        "chairTitle" => $this->getChairTitle(),
        "groupTitle" => $this->getGroupTitle(),
        "dateStart" => $this->getDateStart(),
        "dateStop" => $this->getDateStop(),
        "medal" => $this->getMedal(),
        "status" => $this->getStatus(),
        "deleted" => $this->getDeleted(),
        "date" => $this->getDate()
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
        "vuz" => $this->getVuz()->asArray(),
        "vuzTitle" => $this->getVuzTitle(),
        "institute" => $this->getInstitute()->asArray(),
        "instituteTitle" => $this->getInstituteTitle(),
        "academy" => $this->getAcademy()->asArray(),
        "academyTitle" => $this->getAcademyTitle(),
        "faculty" => $this->getFaculty()->asArray(),
        "facultyTitle" => $this->getFacultyTitle(),
        "chair" => $this->getChair()->asArray(),
        "chairTitle" => $this->getChairTitle(),
        "groupTitle" => $this->getGroupTitle(),
        "dateStart" => $this->getDateStart(),
        "dateStop" => $this->getDateStop(),
        "medal" => $this->getMedal(),
        "status" => $this->getStatus(),
        "deleted" => $this->getDeleted(),
        "date" => $this->getDate()
        );
    }


}
