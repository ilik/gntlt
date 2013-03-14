<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class VideoForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Video';

    public function __construct()
    {
        self::$model = new \Orm\Model\Video;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"ownerType" => "Владелец",
        	"title" => "Наименование",
        	"description" => "Описание",
        	"link" => "Ссылка",
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

    public function ownerId($attribute, $htmlOptions = array())
    {
        return $this->hidden('ownerId', $htmlOptions = array());
    }

    public function ownerType($args = array())
    {
        return $this->text("ownerType", $args);
    }

    public function title($args = array())
    {
        return $this->text("title", $args);
    }

    public function description($args = array())
    {
        return $this->text("description", $args);
    }

    public function link($args = array())
    {
        return $this->text("link", $args);
    }

    public function created($args = array())
    {
        return $this->text("created", $args);
    }

    public function updated($args = array())
    {
        return $this->text("updated", $args);
    }

    public function deleted($args = array())
    {
        return $this->text("deleted", $args);
    }


}
