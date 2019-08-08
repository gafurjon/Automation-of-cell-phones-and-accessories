<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bonus_for_megamobile".
 *
 * @property integer $id_bonus
 * @property integer $bonus
 * @property integer $status
 */
class BonusForMegamobile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bonus_for_megamobile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bonus', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bonus' => 'Id Bonus',
            'bonus' => 'Bonus',
            'status' => 'Status',
        ];
    }
}
