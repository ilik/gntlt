<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class SchoolUseForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'SchoolUse';

    public function __construct()
    {
        self::$model = new \Orm\Model\SchoolUse;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"score" => "Название",

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

    public function mySchoolId($attribute, $htmlOptions = array())
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

    public function schoolSubjectId($attribute, $htmlOptions = array())
    {
        //TODO set data var
        			$data = array();
        			return $this->select($attribute, $data, $htmlOptions = array());
    }

    public function score($args = array())
    {
        return $this->text("score", $args);
    }


}
