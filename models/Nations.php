<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nations".
 *
 * @property integer $id_nation
 * @property string $nation_name
 *
 * @property Persons[] $persons
 */
class Nations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nation_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nation' => 'Id Nation',
            'nation_name' => 'Nation Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersons()
    {
        return $this->hasMany(Persons::className(), ['id_nation' => 'id_nation']);
    }
}
