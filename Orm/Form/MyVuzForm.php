<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class MyVuzForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'MyVuz';

    public function __construct()
    {
        self::$model = new \Orm\Model\MyVuz;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"vuzTitle" => "Название вуза",
        	"instituteTitle" => "Название института",
        	"academyTitle" => "Название академии",
        	"facultyTitle" => "Название факультета",
        	"chairTitle" => "Название кафедры",
        	"groupTitle" => "Название группы",
        	"dateStart" => "Дата поступления",
        	"dateStop" => "Дата выпуска",
        	"medal" => "Форма обучения",
        	"status" => "Статус",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function vuzTitle($args = array())
    {
        return $this->text("vuzTitle", $args);
    }

    public function instituteTitle($args = array())
    {
        return $this->text("instituteTitle", $args);
    }

    public function academyTitle($args = array())
    {
        return $this->text("academyTitle", $args);
    }

    public function facultyTitle($args = array())
    {
        return $this->text("facultyTitle", $args);
    }

    public function chairTitle($args = array())
    {
        return $this->text("chairTitle", $args);
    }

    public function groupTitle($args = array())
    {
        return $this->text("groupTitle", $args);
    }

    public function dateStart($args = array())
    {
        return $this->text("dateStart", $args);
    }

    public function dateStop($args = array())
    {
        return $this->text("dateStop", $args);
    }

    public function medal($attribute, $htmlOptions = array())
    {
        //TODO set data var
        		$data = array();
        		return $this->select("medal", $data, $htmlOptions = array());
    }

    public function status($attribute, $htmlOptions = array())
    {
        //TODO set data var
        		$data = array();
        		return $this->select("status", $data, $htmlOptions = array());
    }


}
