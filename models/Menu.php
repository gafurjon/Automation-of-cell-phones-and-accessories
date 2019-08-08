<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id_menu
 * @property string $page
 * @property string $url
 * @property integer $menu_status
 * @property string $ico
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_status'], 'integer'],
            [['page', 'url', 'ico'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'page' => 'Page',
            'url' => 'Url',
            'menu_status' => 'Menu Status',
            'ico' => 'Ico',
        ];
    }
    

public static function getMenu($id)    {
        return Menu::find()->where('parent_id >=0 and menu_status = '.$id. ' order by page')->all();



        //return $users['surname'].' '.$users['name'].' '.$users['middle_name'];
    }




  public static function getAccess($module, $controller, $action){

            $userStatus = Yii::$app->user->identity['user_id'];

          
            if($userStatus > 0){
                $query = new Query();
                $sql = $query
                    ->select('*')
                    ->from(static::tableName(). ' as m')
                    ->where([
                        'm.`status`'=>1,
                        'm.`menu_status`'=>$userStatus,
                        'm.`url`'=>'index.php?r='.$module.'/'.$controller.'/'.$action])->one();

                if(count($sql)>0 && $sql['status']== 1){
                    return true;
                }
                else {
                    return false;
                }

            }

            if(Yii::$app->user->identity['user_id'] === 3 && $module <> 'prod'){

                return Yii::$app->response->redirect(['site/hato']);

            }
   }

    public static function getNameMenu($id_menu){
        $query = new Query();
        $result = $query
            ->select('page')
            ->from(['menu'])
            ->where('id_menu=:id_menu',[':id_menu'=>$id_menu])
            ->all();
        return $result;
    }

    public static function getId($id_menu){
         $query = new Query();
         $result = $query
            ->select('category.id_category')
            ->from(['menu','category'])
            ->where('menu.page=category.name and 
                menu.status=1 and menu.id_menu=:id_menu',[':id_menu'=>$id_menu])
            ->one();
             return $result;
    }

   
}
