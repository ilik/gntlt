<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\User\UserFinder;
use Orm\Finder\MySchool\MySchoolFinder;
use Orm\Finder\School\SchoolFinder;
use Orm\Finder\SchoolSubject\SchoolSubjectFinder;

class SchoolUseAbstract extends ModelAbstract
{

    private $id = null;

    private $userId = null;

    private $user = null;

    private $mySchoolId = null;

    private $mySchool = null;

    private $schoolId = null;

    private $school = null;

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

    public function getMySchoolId()
    {
        return $this->mySchoolId;
    }

    public function setMySchoolId($mySchoolId)
    {
        $this->mySchoolId = $mySchoolId;
        return $this;
    }

    public function getMySchool()
    {
        return \Yii::app()->orm->getOrm()->getMySchoolFinder()->getById($this->getMySchoolId());
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
        return 'schooluse';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "userId" => $this->getUserId(),
        "mySchoolId" => $this->getMySchoolId(),
        "schoolId" => $this->getSchoolId(),
        "schoolSubjectId" => $this->getSchoolSubjectId(),
        "score" => $this->getScore(),
        "date" => $this->getDate()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "user" => $this->getUser()->asArray(),
        "mySchool" => $this->getMySchool()->asArray(),
        "school" => $this->getSchool()->asArray(),
        "schoolSubject" => $this->getSchoolSubject()->asArray(),
        "score" => $this->getScore(),
        "date" => $this->getDate()
        );
    }


}
