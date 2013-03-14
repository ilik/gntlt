<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class AudioForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Audio';

    public function __construct()
    {
        self::$model = new \Orm\Model\Audio;
    }

    public function init()
    {
    }


}
