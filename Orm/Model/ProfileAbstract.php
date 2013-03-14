<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\User\UserFinder;
use Orm\Finder\Country\CountryFinder;
use Orm\Finder\Region\RegionFinder;
use Orm\Finder\District\DistrictFinder;
use Orm\Finder\City\CityFinder;

class ProfileAbstract extends ModelAbstract
{

    private $id = null;

    private $lastname = null;

    private $firstname = null;

    private $middlename = null;

    private $userId = null;

    private $user = null;

    private $birthday = null;

    private $birthdayIsPublic = null;

    private $sex = null;

    private $countryId = null;

    private $country = null;

    private $regionId = null;

    private $region = null;

    private $districtId = null;

    private $district = null;

    private $cityId = null;

    private $city = null;

    private $science = null;

    private $religion = null;

    private $sport = null;

    private $music = null;

    private $movie = null;

    private $book = null;

    private $created = null;

    private $updated = null;

    private $deleted = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getMiddlename()
    {
        return $this->middlename;
    }

    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;
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

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getBirthdayIsPublic()
    {
        return $this->birthdayIsPublic;
    }

    public function setBirthdayIsPublic($birthdayIsPublic)
    {
        $this->birthdayIsPublic = $birthdayIsPublic;
        return $this;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
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

    public function getScience()
    {
        return $this->science;
    }

    public function setScience($science)
    {
        $this->science = $science;
        return $this;
    }

    public function getReligion()
    {
        return $this->religion;
    }

    public function setReligion($religion)
    {
        $this->religion = $religion;
        return $this;
    }

    public function getSport()
    {
        return $this->sport;
    }

    public function setSport($sport)
    {
        $this->sport = $sport;
        return $this;
    }

    public function getMusic()
    {
        return $this->music;
    }

    public function setMusic($music)
    {
        $this->music = $music;
        return $this;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function setMovie($movie)
    {
        $this->movie = $movie;
        return $this;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
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

    public function tableName()
    {
        return 'profile';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "lastname" => $this->getLastname(),
        "firstname" => $this->getFirstname(),
        "middlename" => $this->getMiddlename(),
        "userId" => $this->getUserId(),
        "birthday" => $this->getBirthday(),
        "birthdayIsPublic" => $this->getBirthdayIsPublic(),
        "sex" => $this->getSex(),
        "countryId" => $this->getCountryId(),
        "regionId" => $this->getRegionId(),
        "districtId" => $this->getDistrictId(),
        "cityId" => $this->getCityId(),
        "science" => $this->getScience(),
        "religion" => $this->getReligion(),
        "sport" => $this->getSport(),
        "music" => $this->getMusic(),
        "movie" => $this->getMovie(),
        "book" => $this->getBook(),
        "created" => $this->getCreated(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "lastname" => $this->getLastname(),
        "firstname" => $this->getFirstname(),
        "middlename" => $this->getMiddlename(),
        "user" => $this->getUser()->asArray(),
        "birthday" => $this->getBirthday(),
        "birthdayIsPublic" => $this->getBirthdayIsPublic(),
        "sex" => $this->getSex(),
        "country" => $this->getCountry()->asArray(),
        "region" => $this->getRegion()->asArray(),
        "district" => $this->getDistrict()->asArray(),
        "city" => $this->getCity()->asArray(),
        "science" => $this->getScience(),
        "religion" => $this->getReligion(),
        "sport" => $this->getSport(),
        "music" => $this->getMusic(),
        "movie" => $this->getMovie(),
        "book" => $this->getBook(),
        "created" => $this->getCreated(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }


}
