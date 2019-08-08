<?php

namespace app\modules\prod;
use \app\models\Menu;
use yii\filters\AccessControl;

/**
 * prod module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\prod\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

     public function behaviors()
    {

        $module = $this->id;
        $controller = \Yii::$app->controller->id;
        $action = \Yii::$app->controller->action->id;


        $access = Menu::getAccess($module, $controller, $action);
        
        // echo \Yii::$app->user->identity['user_id'];     
   

        if ($access == true) {

             
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['prod']
                        ]
                    ]
                ]
            ];
        } else {
            return[
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => false,

                        ]

                    ]
                ]
            ];
        }

    }
}
