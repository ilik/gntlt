<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class AuthorsAbstract extends ModelAbstract
{

    private $id = null;

    private $name = null;

    private $surname = null;

    private $patronymic = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
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

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function getPatronymic()
    {
        return $this->patronymic;
    }

    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
        return $this;
    }

    public function tableName()
    {
        return 'authors';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "name" => $this->getName(),
        "surname" => $this->getSurname(),
        "patronymic" => $this->getPatronymic()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "name" => $this->getName(),
        "surname" => $this->getSurname(),
        "patronymic" => $this->getPatronymic()
        );
    }


}
