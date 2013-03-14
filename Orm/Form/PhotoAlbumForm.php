<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class PhotoAlbumForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'PhotoAlbum';

    public function __construct()
    {
        self::$model = new \Orm\Model\PhotoAlbum;
	    $this->init();
    }

    public function init()
    {
        $this->labels = array(
        	"ownerType" => "Владелец",
        	"title" => "Наименование",
        	"albumFace" => "Обложка",
        	"updated" => "Дата обновления",
        	"deleted" => "Удалено",
        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function ownerId($attribute, $htmlOptions = array())
    {
        return $this->hidden('ownerId', $htmlOptions = array());
    }

    public function ownerType($args =array())
    {
        return $this->text("ownerType", $args);
    }

    public function title($args)
    {
        return $this->text("title", $args);
    }

    public function albumFace($args = array())
    {
	    //TODO доделать селекты
        //return $this->text("albumFace", $args);
	    $data = \Yii::app()->orm->getOrm()->getPhotoAlbumFinder()->getList()->asArray();
        return $this->select('albumFace', $data, $htmlOptions = array());
    }

    public function updated($args)
    {
        return $this->text("updated", $args);
    }

    public function deleted($args)
    {
        return $this->text("deleted", $args);
    }


}
