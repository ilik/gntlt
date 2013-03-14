<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\VuzSpeciality\VuzSpecialityFinder;
use Orm\Finder\SchoolSubject\SchoolSubjectFinder;

class VuzEntranceExamsAbstract extends ModelAbstract
{

    private $id = null;

    private $vuzSpecialityId = null;

    private $vuzSpeciality = null;

    private $schoolSubjectId = null;

    private $schoolSubject = null;

    private $score = null;

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

    public function getVuzSpecialityId()
    {
        return $this->vuzSpecialityId;
    }

    public function setVuzSpecialityId($vuzSpecialityId)
    {
        $this->vuzSpecialityId = $vuzSpecialityId;
        return $this;
    }

    public function getVuzSpeciality()
    {
        return \Yii::app()->orm->getOrm()->getVuzSpecialityFinder()->getById($this->getVuzSpecialityId());
    }

    public function getSchoolSubjectId()
    {
        return $this->schoolSubjectId;
    }

    public function setSchoolSubjectId($schoolSubjectId)
    {
        $this->schoolSubjectId = $schoolSubjectId;
        return $this;
    }

    public function getSchoolSubject()
    {
        return \Yii::app()->orm->getOrm()->getSchoolSubjectFinder()->getById($this->getSchoolSubjectId());
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
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
        return 'vuzentranceexams';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "vuzSpecialityId" => $this->getVuzSpecialityId(),
        "schoolSubjectId" => $this->getSchoolSubjectId(),
        "score" => $this->getScore(),
        "date" => $this->getDate()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "vuzSpeciality" => $this->getVuzSpeciality()->asArray(),
        "schoolSubject" => $this->getSchoolSubject()->asArray(),
        "score" => $this->getScore(),
        "date" => $this->getDate()
        );
    }


}
