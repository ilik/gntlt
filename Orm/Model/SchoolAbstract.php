<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Country\CountryFinder;
use Orm\Finder\District\DistrictFinder;
use Orm\Finder\Region\RegionFinder;
use Orm\Finder\City\CityFinder;

class SchoolAbstract extends ModelAbstract
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

    private $title = null;

    private $number = null;

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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function tableName()
    {
        return 'school';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "countryId" => $this->getCountryId(),
        "districtId" => $this->getDistrictId(),
        "regionId" => $this->getRegionId(),
        "cityId" => $this->getCityId(),
        "title" => $this->getTitle(),
        "number" => $this->getNumber()
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
        "title" => $this->getTitle(),
        "number" => $this->getNumber()
        );
    }


}
