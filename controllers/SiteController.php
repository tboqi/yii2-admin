<?php
namespace app\modules\admin\controllers;

use app\modules\admin\components\MenuHelper;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->layout = false;
            return true;
        }

        return false;
    }
    public function actionMain()
    {
        return $this->render('//admin/site/main.tpl', [
            'url' => [
                'static' => '/statics/',
            ],
        ]);
    }

    public function actionIndex()
    {
        $userId = Yii::$app->user->id;
        $menu = MenuHelper::getAssignedMenu($userId);
        $userInfo = Yii::$app->authManager->getRolesByUser($userId);
        // var_dump($userInfo);exit;

        return $this->render('//admin/site/index.tpl', [
            'url' => [
                'static' => '/statics/',
            ],
            'menu' => $menu,
            'userInfo' => [
                'role' => key($userInfo),
                'id' => $userId,
                'name' => Yii::$app->user->identity->username,
            ],
        ]);
    }
}
