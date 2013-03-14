<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class UserFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\User";
public static $tableName = "user";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByProfileId($profileId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('profileId', $profileId)
        			->fetchOne();
    }

    public function getByOwnedProfileId($ownedProfileId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('ownedProfileId', $ownedProfileId)
        			->fetchAll();
    }

    public function getByName($name)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('name', $name)
        			->fetchAll();
    }

    public function getByPassword($password)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('password', $password)
        			->fetchAll();
    }

    public function getBySalt($salt)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('salt', $salt)
        			->fetchAll();
    }

    public function getByEmail($email)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('email', $email)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
