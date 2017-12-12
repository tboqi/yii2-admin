<?php
namespace app\modules\admin\controllers;

use app\modules\admin\components\MenuHelper;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionMain()
    {
        $this->layout = false;
        return $this->render('//admin/site/main.tpl', [
            'url' => [
                'static' => '/statics/',
            ],
        ]);
    }

    public function actionIndex()
    {
        $this->layout = false;
        $menu = MenuHelper::getAssignedMenu(Yii::$app->user->id);
        // var_dump($menu);exit;
        $userId = Yii::$app->user->identity->getId();
        $userInfo = Yii::$app->authManager->getRolesByUser($userId);
        // var_dump($userInfo);exit;

        return $this->render('//admin/site/index.tpl', [
            'url' => [
                'static' => '/statics/',
            ],
            'menu' => $menu,
            'userInfo' => [
                'role' => key($userInfo),
                'id' => Yii::$app->user->identity->getId(),
                'name' => Yii::$app->user->identity->username,
            ],
        ]);
    }
}
