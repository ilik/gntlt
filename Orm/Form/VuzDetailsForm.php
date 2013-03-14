<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class VuzDetailsForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'VuzDetails';

    public function __construct()
    {
        self::$model = new \Orm\Model\VuzDetails;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"description" => "Описание",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function description($args = array())
    {
        return $this->text("description", $args);
    }


}
