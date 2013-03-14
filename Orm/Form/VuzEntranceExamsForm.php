<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class VuzEntranceExamsForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'VuzEntranceExams';

    public function __construct()
    {
        self::$model = new \Orm\Model\VuzEntranceExams;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"score" => "Проходной балл",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function vuzSpecialityId($attribute, $htmlOptions = array())
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
