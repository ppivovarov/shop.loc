<?php
declare(strict_types=1);

namespace app\modules\admin\controllers;

class MainController extends AppAdminController
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionTest(): string
    {
        return $this->render('test');
    }
}
