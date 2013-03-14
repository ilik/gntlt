<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class RegionForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Region';

    public function __construct()
    {
        self::$model = new \Orm\Model\Region;
    }

    public function init()
    {
    }


}
