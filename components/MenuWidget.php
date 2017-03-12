<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 12.03.2017
 * Time: 17:37
 */

namespace app\components;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tpl;

    public function init()
    {
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        return $this->tpl;
    }

}