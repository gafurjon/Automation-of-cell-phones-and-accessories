<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "bonus_table".
 *
 * @property integer $id_bonus_table
 * @property string $tel_client
 * @property double $bonus_sum
 * @property integer $status
 */
class BonusTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bonus_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bonus_sum'], 'number'],
            [['status'], 'integer'],
            [['tel_client'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bonus_table' => 'Id Bonus Table',
            'tel_client' => 'Телефон',
            'bonus_sum' => 'Бонуси умумӣ',
            'status' => 'Status',
        ];
    }

    public static function getBonus(){
        $query = new Query();
        $results = $query
            ->select('*')
            ->from([BonusTable::tableName()])
            ->where('status=1')
            ->orderBy('bonus_sum DESC')
            ->all();
           return $results;
        }
}
