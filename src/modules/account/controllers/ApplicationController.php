<?php
namespace app\modules\account\controllers;

class ApplicationController extends \wajox\yii2base\controllers\AuthenticatedController
{
    public function signInRedirect()
    {
        throw new \yii\web\NotFoundHttpException();
    }
}
