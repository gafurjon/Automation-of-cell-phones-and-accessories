<?php

namespace app\models;

use Yii;

use yii\db\Query;
use app\models\Users;
/**
 * This is the model class for table "persons".
 *
 * @property integer $id_persons
 * @property string $login
 * @property string $password
 * @property integer $user_id
 * @property integer $telefon
 * @property string $name
 * @property string $surname
 * @property string $middle_name
 * @property string $brithday
 * @property integer $gender
 * @property integer $id_regions
 * @property integer $id_zoning
 * @property string $adress
 * @property string $picture
 * @property integer $persons_status
 * @property integer $id_nation
 *
 * @property Nations $idNation
 * @property Regions $idRegions
 * @property Users $user
 * @property Students[] $students
 * @property Teachers[] $teachers
 */
class Persons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'tel', 'persons_status'], 'integer'],
            [['brithday'], 'safe'],
            [['picture'], 'string'],
            [['login'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['name', 'surname', 'middle_name', 'suroga'], 'string', 'max' => 25],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persons' => 'Id Persons',
            'login' => 'Логин',
            'password' => 'Парол',
            'user_id' => 'Дастрасӣ',
            'tel' => 'Рақами телефон',
            'name' => 'Ном',
            'surname' => 'Насаб',
            'middle_name' => 'Номи падар',
            'brithday' => 'Рӯзи таваллуд',
            'suroga' => 'Суроға',
            'picture' => 'Сурат',
            'persons_status' => 'Persons Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   
}