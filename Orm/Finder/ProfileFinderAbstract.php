<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class ProfileFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Profile";
public static $tableName = "profile";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByLastname($lastname)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('lastname', $lastname)
        			->fetchAll();
    }

    public function getByFirstname($firstname)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('firstname', $firstname)
        			->fetchAll();
    }

    public function getByMiddlename($middlename)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('middlename', $middlename)
        			->fetchAll();
    }

    public function getByUserId($userId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('userId', $userId)
        			->fetchOne();
    }

    public function getByBirthday($birthday)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('birthday', $birthday)
        			->fetchAll();
    }

    public function getByBirthdayIsPublic($birthdayIsPublic)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('birthdayIsPublic', $birthdayIsPublic)
        			->fetchAll();
    }

    public function getBySex($sex)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('sex', $sex)
        			->fetchAll();
    }

    public function getByCountryId($countryId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countryId', $countryId)
        			->fetchOne();
    }

    public function getByRegionId($regionId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('regionId', $regionId)
        			->fetchOne();
    }

    public function getByDistrictId($districtId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('districtId', $districtId)
        			->fetchOne();
    }

    public function getByCityId($cityId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('cityId', $cityId)
        			->fetchOne();
    }

    public function getByScience($science)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('science', $science)
        			->fetchAll();
    }

    public function getByReligion($religion)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('religion', $religion)
        			->fetchAll();
    }

    public function getBySport($sport)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('sport', $sport)
        			->fetchAll();
    }

    public function getByMusic($music)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('music', $music)
        			->fetchAll();
    }

    public function getByMovie($movie)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('movie', $movie)
        			->fetchAll();
    }

    public function getByBook($book)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('book', $book)
        			->fetchAll();
    }

    public function getByCreated($created)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('created', $created)
        			->fetchAll();
    }

    public function getByUpdated($updated)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('updated', $updated)
        			->fetchAll();
    }

    public function getByDeleted($deleted)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('deleted', $deleted)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
