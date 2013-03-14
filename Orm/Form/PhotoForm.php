<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class PhotoForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Photo';

    public function __construct()
    {
        self::$model = new \Orm\Model\Photo;
    }

    public function init()
    {
        $this->labels = array(
        			
        	"ownerType" => "Владелец",
        	"title" => "Наименование",
        	"description" => "Описание",
        	"created" => "Дата создания",
        	"updated" => "Дата обновления",
        	"deleted" => "Удалено",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function fileId($attribute, $htmlOptions = array())
    {
        return $this->hidden('fileId', $htmlOptions = array());
    }

    public function albumId($attribute, $htmlOptions = array())
    {
        return $this->hidden('albumId', $htmlOptions = array());
    }

    public function ownerId($attribute, $htmlOptions = array())
    {
        return $this->hidden('ownerId', $htmlOptions = array());
    }

    public function ownerType($args)
    {
        return $this->text("ownerType", $args);
    }

    public function title($args)
    {
        return $this->text("title", $args);
    }

    public function description($args)
    {
        return $this->text("description", $args);
    }

    public function created($args)
    {
        return $this->text("created", $args);
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
