<?php

namespace app\modules\prod\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Storage;
use app\models\SellingProduct;
use app\models\BonusTable;

/**
 * Default controller for the `prod` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$session=\Yii::$app->session;
        $session['tmp']='3';
        $session['is_online']=\Yii::$app->db->createCommand('UPDATE persons SET is_online=1 WHERE id_persons='.\Yii::$app->user->id)
            ->execute();

        $storage=Storage::find()->where('quantity<=5')->AsArray()->all();

        

       // \Yii::$app->user->id
        return $this->render('index', compact('storage'));
        
    }
}
