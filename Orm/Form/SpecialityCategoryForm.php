<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class SpecialityCategoryForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'SpecialityCategory';

    public function __construct()
    {
        self::$model = new \Orm\Model\SpecialityCategory;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"code" => "Код",
        	"title" => "Название",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function code($args = array())
    {
        return $this->text("code", $args);
    }

    public function title($args = array())
    {
        return $this->text("title", $args);
    }


}
