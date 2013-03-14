<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class MatherialFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Matherial";
public static $tableName = "matherial";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByOwnerId($ownerId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('ownerId', $ownerId)
        			->fetchAll();
    }

    public function getByOwnerType($ownerType)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('ownerType', $ownerType)
        			->fetchAll();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByDescription($description)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('description', $description)
        			->fetchAll();
    }

    public function getByTypeId($typeId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('typeId', $typeId)
        			->fetchAll();
    }

    public function getBySortId($sortId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('sortId', $sortId)
        			->fetchAll();
    }

    public function getByBranchId($branchId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('branchId', $branchId)
        			->fetchAll();
    }

    public function getByDisciplineId($disciplineId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('disciplineId', $disciplineId)
        			->fetchAll();
    }

    public function getByIconId($iconId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('iconId', $iconId)
        			->fetchAll();
    }

    public function getByIconType($iconType)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('iconType', $iconType)
        			->fetchAll();
    }

    public function getByYear($year)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('year', $year)
        			->fetchAll();
    }

    public function getByCost($cost)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('cost', $cost)
        			->fetchAll();
    }

    public function getBySum($sum)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('sum', $sum)
        			->fetchAll();
    }

    public function getByValuteId($valuteId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('valuteId', $valuteId)
        			->fetchAll();
    }

    public function getByAuthorType($authorType)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('authorType', $authorType)
        			->fetchAll();
    }

    public function getByAuthorId($authorId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('authorId', $authorId)
        			->fetchAll();
    }

    public function getByCountAudio($countAudio)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countAudio', $countAudio)
        			->fetchAll();
    }

    public function getByAudioId($audioId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('audioId', $audioId)
        			->fetchAll();
    }

    public function getByCountVideo($countVideo)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countVideo', $countVideo)
        			->fetchAll();
    }

    public function getByVideoId($videoId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('videoId', $videoId)
        			->fetchAll();
    }

    public function getByCountDocument($countDocument)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countDocument', $countDocument)
        			->fetchAll();
    }

    public function getByDocumentId($documentId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('documentId', $documentId)
        			->fetchAll();
    }

    public function getByCountPhoto($countPhoto)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('countPhoto', $countPhoto)
        			->fetchAll();
    }

    public function getByPhotoId($photoId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('photoId', $photoId)
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
