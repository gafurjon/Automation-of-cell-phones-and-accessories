<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "category".
 *
 * @property integer $id_category
 * @property string $name
 * @property integer $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'Id Category',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
    public static function getCate(){
        $query = new Query();
        $result = $query
            ->select('*')
            ->from([Category::tableName().' as c',])
            ->all();
        return $result;
    }
    public static function getNameCategory($id_category){
        $query = new Query();
        $result = $query
            ->select('name')
            ->from(['category'])
            ->where('id_category=:id_category',[':id_category'=>$id_category])
            ->all();
        return $result;
    }
}
