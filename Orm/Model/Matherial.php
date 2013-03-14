<?php
namespace Orm\Model;

use Orm\Model\MatherialAbstract;
use Orm\ResultMap;

class Matherial extends MatherialAbstract
{
	//private $branch = null;

	public function getBranch(){
		return \Yii::app()->orm->getOrm()->getBranchesFinder()->getById($this->getBranchId());
	}

	public function getType(){
		return \Yii::app()->orm->getOrm()->getMatterTypeFinder()->getById($this->getTypeId());
	}

	public function getSort(){
		return \Yii::app()->orm->getOrm()->getMatterSortFinder()->getById($this->getSortId());
	}

	public function getDiscipline(){
		return \Yii::app()->orm->getOrm()->getDisciplineFinder()->getById($this->getDisciplineId());
	}

	public function getAuthor(){
		//return \Yii::app()->orm->getOrm()->getDisciplineFinder()->getById($this->getDisciplineId());
		return \Yii::app()->orm->getOrm()->getAuthorsFinder()->getById($this->getAuthorId());
	}

	/*
	 * @returns array
	 * TODO recursive collection asArray named voids
	 */
	public function getAttachedFiles(){
		if ($this->getCountAudio()>0){
			$resultFiles['Аудио'] = $this->getAudio()->asArray();
		}
		if ($this->getCountVideo()>0){
			$resultFiles['Видео'] = $this->getVideo()->asArray();
		}
		if ($this->getCountPhoto()>0){
			$resultFiles['Фотографии'] = $this->getPhoto()->asArray();
		}
		if ($this->getCountDocument()>0){
			$resultFiles['Документы'] = $this->getDocument()->asArray();
		}

		return $resultFiles;
	}

}
