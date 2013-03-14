<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Country\CountryFinder;

class DistrictAbstract extends ModelAbstract
{

    private $id = null;

    private $countryId = null;

    private $country = null;

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
        return 'district';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "countryId" => $this->getCountryId(),
        "title" => $this->getTitle()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "country" => $this->getCountry()->asArray(),
        "title" => $this->getTitle()
        );
    }


}
