<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Country\CountryFinder;
use Orm\Finder\District\DistrictFinder;
use Orm\Finder\Region\RegionFinder;

class CityAbstract extends ModelAbstract
{

    private $id = null;

    private $countryId = null;

    private $country = null;

    private $districtId = null;

    private $district = null;

    private $regionId = null;

    private $region = null;

    private $title = null;

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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function tableName()
    {
        return 'city';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "countryId" => $this->getCountryId(),
        "districtId" => $this->getDistrictId(),
        "regionId" => $this->getRegionId(),
        "title" => $this->getTitle()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "country" => $this->getCountry()->asArray(),
        "district" => $this->getDistrict()->asArray(),
        "region" => $this->getRegion()->asArray(),
        "title" => $this->getTitle()
        );
    }


}
