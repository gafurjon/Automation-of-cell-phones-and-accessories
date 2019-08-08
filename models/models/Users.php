<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $name_user
 */
class Users extends \yii\db\ActiveRecord 
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name_user' => 'Name User',
        ];
    }

    public static function getUserid($id){
        return static::findOne(['user_id'=>$id]);
    }
    
    public static function getUsers(){
        $query = new Query();
        $result = $query
            ->select('*')
            ->from(['users'])
            ->all();
        return $result;
    }



}
