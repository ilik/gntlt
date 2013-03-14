<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class BranchesForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Branches';

    public function __construct()
    {
        self::$model = new \Orm\Model\Branches;
        					$this->init();
    }

    public function init()
    {
    }


}
