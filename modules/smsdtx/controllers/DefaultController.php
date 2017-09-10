<?php

namespace app\modules\smsdtx\controllers;

use yii\web\Controller;

/**
 * Default controller for the `smsdtx` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
        return $this->redirect(['/smsdtx/sms']);
    }
}
