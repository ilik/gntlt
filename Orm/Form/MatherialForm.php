<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class MatherialForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Matherial';

    public function __construct()
    {
        self::$model = new \Orm\Model\Matherial;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"ownerType" => "Владелец",
        	"title" => "Наименование",
        	"description" => "Описание",
        	"year" => "Год публикации",
        	"created" => "Дата создания",
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

    public function typeId($attribute, $htmlOptions = array())
    {
        return $this->hidden('typeId', $htmlOptions = array());
    }

    public function sortId($attribute, $htmlOptions = array())
    {
        return $this->hidden('sortId', $htmlOptions = array());
    }

    public function branchId($attribute, $htmlOptions = array())
    {
        return $this->hidden('branchId', $htmlOptions = array());
    }

    public function disciplineId($attribute, $htmlOptions = array())
    {
        return $this->hidden('disciplineId', $htmlOptions = array());
    }

    public function iconId($attribute, $htmlOptions = array())
    {
        return $this->hidden('iconId', $htmlOptions = array());
    }

    public function iconType($attribute, $htmlOptions = array())
    {
        return $this->hidden('iconType', $htmlOptions = array());
    }

    public function year($args = array())
    {
        return $this->text("year", $args);
    }

    public function cost($args = array())
    {
        return $this->text("cost", $args);
    }

    public function sum($args = array())
    {
        return $this->text("sum", $args);
    }

    public function valuteId($attribute, $htmlOptions = array())
    {
        return $this->hidden('valuteId', $htmlOptions = array());
    }

    public function authorType($attribute, $htmlOptions = array())
    {
        return $this->hidden('authorType', $htmlOptions = array());
    }

    public function authorId($attribute, $htmlOptions = array())
    {
        return $this->hidden('authorId', $htmlOptions = array());
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
