<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class PhotoAbstract extends ModelAbstract
{

    private $id = null;

    private $fileId = null;

    private $albumId = null;

    private $ownerId = null;

    private $ownerType = null;

    private $title = null;

    private $description = null;

    private $matherialId = null;

    private $iconId = null;

    private $iconType = null;

    private $created = null;

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

    public function getFileId()
    {
        return $this->fileId;
    }

    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    public function getAlbumId()
    {
        return $this->albumId;
    }

    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getMatherialId()
    {
        return $this->matherialId;
    }

    public function setMatherialId($matherialId)
    {
        $this->matherialId = $matherialId;
        return $this;
    }

    public function getIconId()
    {
        return $this->iconId;
    }

    public function setIconId($iconId)
    {
        $this->iconId = $iconId;
        return $this;
    }

    public function getIconType()
    {
        return $this->iconType;
    }

    public function setIconType($iconType)
    {
        $this->iconType = $iconType;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
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
        return 'photo';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "fileId" => $this->getFileId(),
        "albumId" => $this->getAlbumId(),
        "ownerId" => $this->getOwnerId(),
        "ownerType" => $this->getOwnerType(),
        "title" => $this->getTitle(),
        "description" => $this->getDescription(),
        "matherialId" => $this->getMatherialId(),
        "iconId" => $this->getIconId(),
        "iconType" => $this->getIconType(),
        "created" => $this->getCreated(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "fileId" => $this->getFileId(),
        "albumId" => $this->getAlbumId(),
        "ownerId" => $this->getOwnerId(),
        "ownerType" => $this->getOwnerType(),
        "title" => $this->getTitle(),
        "description" => $this->getDescription(),
        "matherialId" => $this->getMatherialId(),
        "iconId" => $this->getIconId(),
        "iconType" => $this->getIconType(),
        "created" => $this->getCreated(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }


}
