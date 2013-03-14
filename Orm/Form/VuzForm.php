<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class VuzForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Vuz';

    public function __construct()
    {
        self::$model = new \Orm\Model\Vuz;
        					$this->init();
    }

    public function init()
    {
        $this->labels = array(
        			
        	"title" => "Название",
        	"titleReduction" => "Аббревиатура",
        	"description" => "Описание",
        	"yearBase" => "Год основания",
        	"address" => "Адрес",
        	"site" => "Сайт",
        	"phone" => "Телефон",
        	"fax" => "Факс",
        	"email" => "Почта",
        	"licenseNumber" => "№ лицензии",
        	"licenseOrder" => "Приказ о выдаче лицензии",
        	"licenseAuthority" => "Орган, издавший приказ",
        	"licenseReallyDate" => "Лицензия действительна до",
        	"accreditationNumber" => "№ свидетельства об аккредитации",
        	"accreditationOrder" => "Приказ об аккредитации",
        	"accreditationAuthority" => "Орган, издавший приказ",
        	"accreditationReallyDate" => "Свидетельство действительно до",
        	"typeTitleVuz" => "Тип вуза",
        	"foundationCourses" => "Подготовительные курсы",
        	"military" => "Военная кафедра",
        	"hostel" => "Общежитие",

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

    public function titleReduction($args = array())
    {
        return $this->text("titleReduction", $args);
    }

    public function description($attribute, $htmlOptions = array())
    {
        return $this->textarea($attribute, $htmlOptions = array());
    }

    public function yearBase($args = array())
    {
        return $this->text("yearBase", $args);
    }

    public function address($args = array())
    {
        return $this->text("address", $args);
    }

    public function site($args = array())
    {
        return $this->text("site", $args);
    }

    public function phone($args = array())
    {
        return $this->text("phone", $args);
    }

    public function fax($args = array())
    {
        return $this->text("fax", $args);
    }

    public function email($args = array())
    {
        return $this->text("email", $args);
    }

    public function licenseNumber($args = array())
    {
        return $this->text("licenseNumber", $args);
    }

    public function licenseOrder($args = array())
    {
        return $this->text("licenseOrder", $args);
    }

    public function licenseAuthority($args = array())
    {
        return $this->text("licenseAuthority", $args);
    }

    public function licenseReallyDate($args = array())
    {
        return $this->text("licenseReallyDate", $args);
    }

    public function accreditationNumber($args = array())
    {
        return $this->text("accreditationNumber", $args);
    }

    public function accreditationOrder($args = array())
    {
        return $this->text("accreditationOrder", $args);
    }

    public function accreditationAuthority($args = array())
    {
        return $this->text("accreditationAuthority", $args);
    }

    public function accreditationReallyDate($args = array())
    {
        return $this->text("accreditationReallyDate", $args);
    }

    public function foundationCourses($attribute, $htmlOptions = array())
    {
        return $this->checkbox($attribute, $htmlOptions = array());
    }

    public function military($attribute, $htmlOptions = array())
    {
        return $this->checkbox($attribute, $htmlOptions = array());
    }

    public function hostel($attribute, $htmlOptions = array())
    {
        return $this->checkbox($attribute, $htmlOptions = array());
    }


}
