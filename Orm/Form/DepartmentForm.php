<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class DepartmentForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Department';

    public function __construct()
    {
        self::$model = new \Orm\Model\Department;
	    $this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"name" => "Наименование",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function name($args = array())
    {
        return $this->text("name", $args);
    }


}
