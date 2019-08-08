<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property integer $id_regions
 * @property string $regions_name
 *
 * @property Persons[] $persons
 * @property Zoning[] $zonings
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regions_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_regions' => 'Id Regions',
            'regions_name' => 'Regions Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersons()
    {
        return $this->hasMany(Persons::className(), ['id_regions' => 'id_regions']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZonings()
    {
        return $this->hasMany(Zoning::className(), ['id_regions' => 'id_regions']);
    }
}
