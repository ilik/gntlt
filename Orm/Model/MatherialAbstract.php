<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Type\TypeFinder;
use Orm\Finder\Sort\SortFinder;
use Orm\Finder\Branch\BranchFinder;
use Orm\Finder\Discipline\DisciplineFinder;
use Orm\Finder\Author\AuthorFinder;
use Orm\Finder\Audio\AudioFinder;
use Orm\Finder\Video\VideoFinder;
use Orm\Finder\Document\DocumentFinder;
use Orm\Finder\Photo\PhotoFinder;

class MatherialAbstract extends ModelAbstract
{

    private $id = null;

    private $ownerId = null;

    private $ownerType = null;

    private $title = null;

    private $description = null;

    private $typeId = null;

    private $type = null;

    private $sortId = null;

    private $sort = null;

    private $branchId = null;

    private $branch = null;

    private $disciplineId = null;

    private $discipline = null;

    private $iconId = null;

    private $iconType = null;

    private $year = null;

    private $cost = null;

    private $sum = null;

    private $valuteId = null;

    private $authorType = null;

    private $authorId = null;

    private $author = null;

    private $countAudio = null;

    private $audioId = null;

    private $audio = null;

    private $countVideo = null;

    private $videoId = null;

    private $video = null;

    private $countDocument = null;

    private $documentId = null;

    private $document = null;

    private $countPhoto = null;

    private $photoId = null;

    private $photo = null;

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

    public function getTypeId()
    {
        return $this->typeId;
    }

    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getType()
    {
        return \Yii::app()->orm->getOrm()->getTypeFinder()->getByMatherialId($this->getId());
    }

    public function getSortId()
    {
        return $this->sortId;
    }

    public function setSortId($sortId)
    {
        $this->sortId = $sortId;
        return $this;
    }

    public function getSort()
    {
        return \Yii::app()->orm->getOrm()->getSortFinder()->getByMatherialId($this->getId());
    }

    public function getBranchId()
    {
        return $this->branchId;
    }

    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
        return $this;
    }

    public function getBranch()
    {
        return \Yii::app()->orm->getOrm()->getBranchFinder()->getByMatherialId($this->getId());
    }

    public function getDisciplineId()
    {
        return $this->disciplineId;
    }

    public function setDisciplineId($disciplineId)
    {
        $this->disciplineId = $disciplineId;
        return $this;
    }

    public function getDiscipline()
    {
        return \Yii::app()->orm->getOrm()->getDisciplineFinder()->getByMatherialId($this->getId());
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

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function setSum($sum)
    {
        $this->sum = $sum;
        return $this;
    }

    public function getValuteId()
    {
        return $this->valuteId;
    }

    public function setValuteId($valuteId)
    {
        $this->valuteId = $valuteId;
        return $this;
    }

    public function getAuthorType()
    {
        return $this->authorType;
    }

    public function setAuthorType($authorType)
    {
        $this->authorType = $authorType;
        return $this;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    public function getAuthor()
    {
        return \Yii::app()->orm->getOrm()->getAuthorFinder()->getByMatherialId($this->getId());
    }

    public function getCountAudio()
    {
        return $this->countAudio;
    }

    public function setCountAudio($countAudio)
    {
        $this->countAudio = $countAudio;
        return $this;
    }

    public function getAudioId()
    {
        return $this->audioId;
    }

    public function setAudioId($audioId)
    {
        $this->audioId = $audioId;
        return $this;
    }

    public function getAudio()
    {
        return \Yii::app()->orm->getOrm()->getAudioFinder()->getByMatherialId($this->getId());
    }

    public function getCountVideo()
    {
        return $this->countVideo;
    }

    public function setCountVideo($countVideo)
    {
        $this->countVideo = $countVideo;
        return $this;
    }

    public function getVideoId()
    {
        return $this->videoId;
    }

    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
        return $this;
    }

    public function getVideo()
    {
        return \Yii::app()->orm->getOrm()->getVideoFinder()->getByMatherialId($this->getId());
    }

    public function getCountDocument()
    {
        return $this->countDocument;
    }

    public function setCountDocument($countDocument)
    {
        $this->countDocument = $countDocument;
        return $this;
    }

    public function getDocumentId()
    {
        return $this->documentId;
    }

    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;
        return $this;
    }

    public function getDocument()
    {
        return \Yii::app()->orm->getOrm()->getDocumentFinder()->getByMatherialId($this->getId());
    }

    public function getCountPhoto()
    {
        return $this->countPhoto;
    }

    public function setCountPhoto($countPhoto)
    {
        $this->countPhoto = $countPhoto;
        return $this;
    }

    public function getPhotoId()
    {
        return $this->photoId;
    }

    public function setPhotoId($photoId)
    {
        $this->photoId = $photoId;
        return $this;
    }

    public function getPhoto()
    {
        return \Yii::app()->orm->getOrm()->getPhotoFinder()->getByMatherialId($this->getId());
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
        return 'matherial';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "ownerId" => $this->getOwnerId(),
        "ownerType" => $this->getOwnerType(),
        "title" => $this->getTitle(),
        "description" => $this->getDescription(),
        "typeId" => $this->getTypeId(),
        "sortId" => $this->getSortId(),
        "branchId" => $this->getBranchId(),
        "disciplineId" => $this->getDisciplineId(),
        "iconId" => $this->getIconId(),
        "iconType" => $this->getIconType(),
        "year" => $this->getYear(),
        "cost" => $this->getCost(),
        "sum" => $this->getSum(),
        "valuteId" => $this->getValuteId(),
        "authorType" => $this->getAuthorType(),
        "authorId" => $this->getAuthorId(),
        "countAudio" => $this->getCountAudio(),
        "audioId" => $this->getAudioId(),
        "countVideo" => $this->getCountVideo(),
        "videoId" => $this->getVideoId(),
        "countDocument" => $this->getCountDocument(),
        "documentId" => $this->getDocumentId(),
        "countPhoto" => $this->getCountPhoto(),
        "photoId" => $this->getPhotoId(),
        "created" => $this->getCreated(),
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
        "description" => $this->getDescription(),
        "type" => $this->getType()->asArray(),
        "sort" => $this->getSort()->asArray(),
        "branch" => $this->getBranch()->asArray(),
        "discipline" => $this->getDiscipline()->asArray(),
        "iconId" => $this->getIconId(),
        "iconType" => $this->getIconType(),
        "year" => $this->getYear(),
        "cost" => $this->getCost(),
        "sum" => $this->getSum(),
        "valuteId" => $this->getValuteId(),
        "authorType" => $this->getAuthorType(),
        "author" => $this->getAuthor()->asArray(),
        "countAudio" => $this->getCountAudio(),
        "audio" => $this->getAudio()->asArray(),
        "countVideo" => $this->getCountVideo(),
        "video" => $this->getVideo()->asArray(),
        "countDocument" => $this->getCountDocument(),
        "document" => $this->getDocument()->asArray(),
        "countPhoto" => $this->getCountPhoto(),
        "photo" => $this->getPhoto()->asArray(),
        "created" => $this->getCreated(),
        "updated" => $this->getUpdated(),
        "deleted" => $this->getDeleted()
        );
    }


}
