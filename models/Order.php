<?php

namespace app\models;

use Yii;
use yii\db\Query;

use app\models\SellingProduct;

/**
 * This is the model class for table "order".
 *
 * @property integer $id_order
 * @property integer $id_storage
 * @property integer $count
 * @property double $selling_price
 * @property double $sum
 * @property string $telefon
 * @property integer $id_persons
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_storage', 'count', 'id_persons'], 'integer'],
            [['selling_price', 'sum'], 'number'],
            [['telefon'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'id_storage' => 'Id Storage',
            'count' => 'Count',
            'selling_price' => 'Selling Price',
            'sum' => 'Sum',
            'telefon' => 'Телефон',
            'id_persons' => 'Id Persons',
        ];
    }


    public static function getOrder($telefon){
        $query = new Query();
        $result = $query
            ->select('order.id_order,`storage`.`id_storage`,`storage`.`product_name`,`order`.`count`,`Order`.`selling_price`,`Order`.`sum`')
            ->from(['Order','storage'])
            ->where('`Order`.`id_storage`=`storage`.`id_storage` AND `order`.`telefon`=:telefon',[':telefon'=>$telefon])
            ->all();
        return $result;
    }

    public static function del_order($id_order){
        $order=Order::findOne($id_order);
        $order->delete();

    }
    public static function minus($id_order){
        $order = Order::findOne($id_order);
        return $order;
    }

    public static function setOrder($id_storage,$telefon){
        $query = new Query();
        $results = $query
            ->select('order.id_order,`storage`.`id_storage`,`storage`.`product_name`,`order`.`count`,`Order`.`selling_price`,`Order`.`sum`')
            ->from(['Order','storage'])
            ->where('`Order`.`id_storage`=`storage`.`id_storage` AND `order`.`id_storage`=:id_storage and `order`.`telefon`=:telefon',[':telefon'=>$telefon, ':id_storage'=>$id_storage])
            ->all();
        if (count($results)<>0 ){
            $order=Order::findOne($results['0']['id_order']);
            $order->count = $results['0']['count'] + 1;
            $order->sum=$results['0']['sum'] + $results['0']['selling_price'];
            $order->update();
            return $results;

           
        }
        else{
            $querys = new Query();
            $results = $querys
                ->select('*')
                ->from(['storage'])
                ->where('id_storage=:id_storage',[':id_storage'=>$id_storage])
                ->all();
            $order = new Order();
            $order->id_storage = $id_storage;
            $order->count=1;
            $order->selling_price=$results['0']['selling_price'];
            $order->sum = $results['0']['selling_price'];
            $order->telefon=$telefon;
            $order->id_persons = Yii::$app->user->id;
            $order->save();
            return $results;
        }


    }


     public  static function setHistory($telefon,$bonus){

        $query = new Query();
        $results = $query
            ->select('`storage`.`id_storage`,`storage`.`product_name`,`Order`.`count`,`Order`.`selling_price`,`Order`.`sum`')
            ->from(['Order','storage'])
            ->where('`Order`.`id_storage`=`storage`.`id_storage` and telefon=:telefon and id_persons=:id_persons',[':telefon'=>$telefon,':id_persons'=>Yii::$app->user->id])
            ->all();

          
        foreach($results as $result)
        {
            
            $history = new SellingProduct();
            $history->id_storage=$result['id_storage'];
            $history->selling_price=$result['selling_price'];
            $history->quantity=$result['count'];
            $history->sum=$result['sum'];

            $history->tel_client=$telefon;
            $history->bonus_tel=$result['sum'];
            $history->id_persons=Yii::$app->user->id;
            $history->selling_data=date("Y-m-d H:i:s");
            $history->save();

        }
        


       //Order::deleteAll(['telefon'=>$telefon]);

    }
}
