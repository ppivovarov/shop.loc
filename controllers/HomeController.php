<?php


namespace app\controllers;


class HomeController extends AppController
{
//    public $layout = 'grocery'; //or in web config file initialize this

    public function actionIndex()
    {
        return $this->render('index');
    }
}