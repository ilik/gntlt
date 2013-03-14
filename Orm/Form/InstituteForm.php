<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class InstituteForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Institute';

    public function __construct()
    {
        self::$model = new \Orm\Model\Institute;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"title" => "Название",

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


}
