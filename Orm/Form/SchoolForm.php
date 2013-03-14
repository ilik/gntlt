<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class SchoolForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'School';

    public function __construct()
    {
        self::$model = new \Orm\Model\School;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"title" => "Название",
        	"number" => "Номер",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function title($args = array())
    {
        return $this->text("title", $args);
    }

    public function number($args = array())
    {
        return $this->text("number", $args);
    }


}
