<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\SpecialityCategory\SpecialityCategoryFinder;

class SpecialtyAbstract extends ModelAbstract
{

    private $id = null;

    private $specialityCategoryId = null;

    private $specialityCategory = null;

    private $code = null;

    private $prefix = null;

    private $title = null;

    private $qualification = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getSpecialityCategoryId()
    {
        return $this->specialityCategoryId;
    }

    public function setSpecialityCategoryId($specialityCategoryId)
    {
        $this->specialityCategoryId = $specialityCategoryId;
        return $this;
    }

    public function getSpecialityCategory()
    {
        return \Yii::app()->orm->getOrm()->getSpecialityCategoryFinder()->getById($this->getSpecialityCategoryId());
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
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

    public function getQualification()
    {
        return $this->qualification;
    }

    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
        return $this;
    }

    public function tableName()
    {
        return 'specialty';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "specialityCategoryId" => $this->getSpecialityCategoryId(),
        "code" => $this->getCode(),
        "prefix" => $this->getPrefix(),
        "title" => $this->getTitle(),
        "qualification" => $this->getQualification()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "specialityCategory" => $this->getSpecialityCategory()->asArray(),
        "code" => $this->getCode(),
        "prefix" => $this->getPrefix(),
        "title" => $this->getTitle(),
        "qualification" => $this->getQualification()
        );
    }


}
