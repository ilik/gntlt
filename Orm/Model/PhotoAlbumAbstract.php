<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class PhotoAlbumAbstract extends ModelAbstract
{

    private $id = null;

    private $ownerId = null;

    private $ownerType = null;

    private $title = null;

    private $albumFace = null;

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

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    public function getOwnerType()
    {
        return $this->ownerType;
    }

    public function setOwnerType($ownerType)
    {
        $this->ownerType = $ownerType;
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

    public function getAlbumFace()
    {
        return $this->albumFace;
    }

    public function setAlbumFace($albumFace)
    {
        $this->albumFace = $albumFace;
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
        return 'photoalbum';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "ownerId" => $this->getOwnerId(),
        "ownerType" => $this->getOwnerType(),
        "title" => $this->getTitle(),
        "albumFace" => $this->getAlbumFace(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "ownerId" => $this->getOwnerId(),
        "ownerType" => $this->getOwnerType(),
        "title" => $this->getTitle(),
        "albumFace" => $this->getAlbumFace(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }


}
