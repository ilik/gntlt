<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class AuthorsFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Authors";
public static $tableName = "authors";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByName($name)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('name', $name)
        			->fetchAll();
    }

    public function getBySurname($surname)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('surname', $surname)
        			->fetchAll();
    }

    public function getByPatronymic($patronymic)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('patronymic', $patronymic)
        			->fetchAll();
    }

    public function getByNameAndSurname($name, $surname)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('name', $name)
        			->eq('surname', $surname)
        			->fetchOne();
    }

    public function getByNameAndSurnameAndPatronymic($name, $surname, $patronymic)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('name', $name)
        			->eq('surname', $surname)
        			->eq('patronymic', $patronymic)
        			->fetchOne();
    }

    public function getBuilder()
    {
        return $this;
    }


}
