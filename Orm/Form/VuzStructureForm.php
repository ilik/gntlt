<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class VuzStructureForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'VuzStructure';

    public function __construct()
    {
        self::$model = new \Orm\Model\VuzStructure;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"itemTitle" => "Название",

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

    public function itemTitle($args = array())
    {
        return $this->text("itemTitle", $args);
    }


}
