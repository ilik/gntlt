<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class VuzSpecialityForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'VuzSpeciality';

    public function __construct()
    {
        self::$model = new \Orm\Model\VuzSpeciality;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"level" => "Образовательный уровень",
        	"formTraining" => "Форма обучения",
        	"department" => "Отделение",
        	"periodTraining" => "Срок обучения",
        	"seats" => "Срок обучения",
        	"cost" => "Стоимость",
        	"startDocuments" => "Дата начало подачи документов",
        	"stopDocuments" => "Конец начало подачи документов",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function vuzId($attribute, $htmlOptions = array())
    {
        return $this->hidden('vuzId', $htmlOptions = array());
    }

    public function vuzStructureId($attribute, $htmlOptions = array())
    {
        return $this->hidden('vuzStructureId', $htmlOptions = array());
    }

    public function specialityCategoryId($attribute, $htmlOptions = array())
    {
        return $this->hidden('specialityCategoryId', $htmlOptions = array());
    }

    public function specialityId($attribute, $htmlOptions = array())
    {
        return $this->hidden('specialityId', $htmlOptions = array());
    }

    public function level($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function formTraining($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function department($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function periodTraining($args = array())
    {
        return $this->text("periodTraining", $args);
    }

    public function seats($args = array())
    {
        return $this->text("seats", $args);
    }

    public function cost($args = array())
    {
        return $this->text("cost", $args);
    }

    public function startDocuments($args = array())
    {
        return $this->text("startDocuments", $args);
    }

    public function stopDocuments($args = array())
    {
        return $this->text("stopDocuments", $args);
    }


}
