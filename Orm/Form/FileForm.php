<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class FileForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'File';

    public function __construct()
    {
        self::$model = new \Orm\Model\File;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"created" => "Дата создания",

        );
    }

    public function id($attribute, $htmlOptions = array())
    {
        return $this->hidden('id', $htmlOptions = array());
    }

    public function url($args = array())
    {
        return $this->text("url", $args);
    }

    public function name($args = array())
    {
        return $this->text("name", $args);
    }

    public function ext($args = array())
    {
        return $this->text("ext", $args);
    }

    public function created($args = array())
    {
        return $this->text("created", $args);
    }


}
