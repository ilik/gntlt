<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class SpecialtyForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Specialty';

    public function __construct()
    {
        self::$model = new \Orm\Model\Specialty;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"code" => "Код",
        	"prefix" => "Префикс",
        	"title" => "Название",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function specialityCategoryId($attribute, $htmlOptions = array())
    {
        return $this->hidden('specialityCategoryId', $htmlOptions = array());
    }

    public function code($args = array())
    {
        return $this->text("code", $args);
    }

    public function prefix($args = array())
    {
        return $this->text("prefix", $args);
    }

    public function title($args = array())
    {
        return $this->text("title", $args);
    }


}
