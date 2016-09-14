<?php
namespace app\modules\account\controllers;

use app\services\wajox_software\NetworkAccountsManager;

class SocialNetworkAccountsController extends ApplicationController
{
    public function beforeAction($action)
    {
        if ($action->id == 'create') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $user = $this->getUser();

        return $this->render('index', ['user' => $user]);
    }

    public function actionCreate()
    {
        $token = $_REQUEST['token'];

        $networkAccount = $this->getManager()->loadUloginToken($token);

        $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $this->getManager()->deleteAccount($id);

        $this->redirect(['index']);
    }

    protected function getManager()
    {
        $user = $this->getUser();

        return $this->createObject(NetworkAccountsManager::className(), [$user]);
    }
}
