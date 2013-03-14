<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Profile\ProfileFinder;
use Orm\Finder\OwnedProfile\OwnedProfileFinder;

class UserAbstract extends ModelAbstract
{

    private $id = null;

    private $profileId = null;

    private $profile = null;

    private $ownedProfileId = null;

    private $ownedProfile = null;

    private $name = null;

    private $password = null;

    private $salt = null;

    private $email = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getProfileId()
    {
        return $this->profileId;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
        return $this;
    }

    public function getProfile()
    {
        return \Yii::app()->orm->getOrm()->getProfileFinder()->getById($this->getProfileId());
    }

    public function getOwnedProfileId()
    {
        return $this->ownedProfileId;
    }

    public function setOwnedProfileId($ownedProfileId)
    {
        $this->ownedProfileId = $ownedProfileId;
        return $this;
    }

    public function getOwnedProfile()
    {
        return \Yii::app()->orm->getOrm()->getOwnedProfileFinder()->getByUserId($this->getId());
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
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

    public function tableName()
    {
        return 'user';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "profileId" => $this->getProfileId(),
        "ownedProfileId" => $this->getOwnedProfileId(),
        "name" => $this->getName(),
        "password" => $this->getPassword(),
        "salt" => $this->getSalt(),
        "email" => $this->getEmail()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "profile" => $this->getProfile()->asArray(),
        "ownedProfile" => $this->getOwnedProfile()->asArray(),
        "name" => $this->getName(),
        "password" => $this->getPassword(),
        "salt" => $this->getSalt(),
        "email" => $this->getEmail()
        );
    }


}
