<?php

namespace app\modules\kassa;

use \app\models\Menu;
use yii\filters\AccessControl;
use Yii;


/**
 * kassa module definition class
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\kassa\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    // public function behaviors()
    // {

    //     $module = $this->id;
    //     $controller = Yii::$app->controller->id;
    //     $action = Yii::$app->controller->action->id;


    //     $access = Menu::getAccess($module, $controller, $action);
    //    // debug($access);
    //    // exit;

    //     if ($access == true) {
    //         return [
    //             'access' => [
    //                 'class' => AccessControl::className(),
    //                 'rules' => [
    //                     [
    //                         'allow' => true,
    //                         'roles' => ['kassa']
    //                     ]
    //                 ]
    //             ]
    //         ];
    //     } else {
    //         return[
    //             'access' => [
    //                 'class' => AccessControl::className(),
    //                 'rules' => [
    //                     [
    //                         'allow' => false,

    //                     ]

    //                 ]
    //             ]
    //         ];
    //     }

    // }

}
