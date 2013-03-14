<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class MySchoolForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'MySchool';

    public function __construct()
    {
        self::$model = new \Orm\Model\MySchool;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"titleSchool" => "Название",
        	"numberSchool" => "Номер",
        	"dateSupply" => "Дата поступления",
        	"dateEnd" => "Дата поступления",
        	"dateIssue" => "Дата поступления",
        	"clas" => "Класс",
        	"specialization" => "Специализация",
        	"medal" => "Медаль",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function userId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function countryId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function districtId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function regionId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function cityId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function schoolId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function titleSchool($args = array())
    {
        return $this->text("titleSchool", $args);
    }

    public function numberSchool($args = array())
    {
        return $this->text("numberSchool", $args);
    }

    public function dateSupply($args = array())
    {
        return $this->text("dateSupply", $args);
    }

    public function dateEnd($args = array())
    {
        return $this->text("dateEnd", $args);
    }

    public function dateIssue($args = array())
    {
        return $this->text("dateIssue", $args);
    }

    public function clas($args = array())
    {
        return $this->text("clas", $args);
    }

    public function specialization($args = array())
    {
        return $this->text("specialization", $args);
    }

    public function medal($attribute, $htmlOptions = array())
    {
        return $this->checkbox($attribute, $htmlOptions = array());
    }


}
