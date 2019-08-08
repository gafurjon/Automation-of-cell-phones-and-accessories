<?php

namespace app\models;


use Yii;
use yii\db\Query;

/**
 * This is the model class for table "selling_product".
 *
 * @property integer $id_selling
 * @property integer $id_storage
 * @property double $selling_price
 * @property integer $quantity
 * @property double $sum
 * @property string $selling_data
 * @property string $selling_time
 * @property string $tel_client
 * @property integer $bonus
 * @property integer $id_persons
 */
class SellingProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'selling_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_storage', 'quantity', 'bonus_tel', 'id_persons'], 'integer'],
            [['selling_price', 'sum'], 'number'],
            [['selling_data', 'selling_time'], 'safe'],
            [['tel_client'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_selling' => 'Id Selling',
            'id_storage' => 'Id Storage',
            'selling_price' => 'Selling Price',
            'quantity' => 'Quantity',
            'sum' => 'Sum',
            'selling_data' => 'Selling Data',
            'selling_time' => 'Selling Time',
            'tel_client' => 'Tel Client',
            'bonus_tel' => 'Bonus',
            'id_persons' => 'Id Persons',
        ];
    }

    public static function account($from_date,$to_date){
        $query = new Query();
            $result = $query
                ->select('sum(sum)')
                ->from([SellingProduct::tableName().' as c',])
                ->where('selling_data between "'.$from_date.' 00:00:00" and "'.$to_date.' 23:59:59"')
                ->all();
        return $result;
    }

    public static function getHistory($from_date,$to_date){
        $query = new Query();
        $results = $query
            ->select('*')
            ->from([SellingProduct::tableName(). ' as h'])
            ->where('selling_data between "'.$from_date.' 00:00:00" and "'. $to_date.' 23:59:59"')
            ->groupBy('id_selling')
            ->all();
        $r=0;
        foreach($results as $result){
            $select[$r] = $query
                ->select('s.`product_name`,SUM(sp.quantity) as count, s.`first_price`, s.`selling_price`, SUM(sp.sum) AS summa')
                ->from([SellingProduct::tableName().' as sp',Storage::tableName().' as s'])
                ->where('sp.id_storage = s.id_storage and sp.id_storage = '.$result['id_storage'].' and selling_data between "'.$from_date.' 00:00:00" and "'. $to_date.' 23:59:59"')
                ->groupBy('sp.id_storage')
                ->all();
            $r++;
        }

        return $select;

    }

    public static function getAll($id_storage,$from_date,$to_date){
        $query = new Query();
        $result = $query
            ->select('s.product_name,sp.selling_price,sp.quantity,sp.sum,sp.selling_data,sp.tel_client')
            ->from([Storage::tableName().' as s',SellingProduct::tableName().' as sp'])
            ->where('sp.id_storage=s.id_storage and sp.id_storage='.$id_storage.' and selling_data between "'.$from_date.' 00:00:00" and "'. $to_date.' 23:59:59"')
            ->all();

        return $result;
    }
}
