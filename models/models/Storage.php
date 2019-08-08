<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "storage".
 *
 * @property integer $id_storage
 * @property string $product_name
 * @property integer $id_category
 * @property integer $quantity
 * @property double $first_price
 * @property double $selling_price
 * @property string $data
 * @property string $time
 */
class Storage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'storage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'quantity'], 'integer'],
            [['first_price', 'selling_price'], 'number'],
            [['data', 'time'], 'safe'],
            [['product_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_storage' => 'Id Storage',
            'product_name' => 'Номи мол',
            'id_category' => 'Категорияи мол',
            'quantity' => 'Миқдор',
            'first_price' => 'Нархи харид',
            'selling_price' => 'Нархид фурӯш',
            'data' => 'Data',
            'time' => 'Time',
            'picture'=>'Сурат',
        ];
    }

     public static function getStorage($id_category){
        $query = new Query();
        $result = $query
            ->select('*')
            ->from([Storage::tableName()])
            ->where('id_category=:id_category',[':id_category'=>$id_category])
            ->orderBy('product_name')
            ->all();
        return $result;
    }

    public static function getName_storage($id_storage){
        $query = new Query();
        $result = $query
            ->select('*')
            ->from([Storage::tableName()])
            ->where('id_storage=:id_storage',[':id_storage'=>$id_storage])
            ->all();
        return $result;
    }
    public static function update_storage($id_storage){
        return Storage::findOne(['id_storage'=>$id_storage]);
    }

     public static function getAll($id_category){
        $query = new Query();
        $result = $query
            ->select('*')
            ->from([Storage::tableName()])
            ->where('id_category=:id_category',[':id_category'=>$id_category])
            ->all();
        return $result;
    }
    
}
