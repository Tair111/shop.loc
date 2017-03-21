<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 20.03.2017
 * Time: 11:21
 */


namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    protected function setMeta ($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'keywords', 'description' => "$description"]);
    }
}