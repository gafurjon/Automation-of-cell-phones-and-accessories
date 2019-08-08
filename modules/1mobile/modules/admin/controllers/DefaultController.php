<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Persons;
use app\models\Users;
use yii\web\UploadedFile;
use Yii;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Category;
use app\models\Storage;
use app\models\SellingProduct;
use app\models\BonusTable;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$session=\Yii::$app->session;
        $session['tmp']='1'; 

        $storage=Storage::find()->where('quantity<=5')->AsArray()->all();

        

       // \Yii::$app->user->id
        return $this->render('index', compact('storage'));
    }

    public function actionInsertPersons()
    {
        $model = new Persons();
        $users = Users::getUsers();

        if( \Yii::$app->getRequest()->isPost ){
        	


          
            if( $model->load( \Yii::$app->request->post() ) && $model->validate() ){

                $model->picture = UploadedFile::getInstance($model,'picture');
                $post=Yii::$app->request->post('Persons');

                if($model->picture){
                    $dir = 'image/';
                    $path = $model->picture->baseName.'.'.$model->picture->extension;
                    $model->picture->saveAs($dir.md5($path).".".$model->picture->extension);
                    $model->picture=$dir.md5($path).".".$model->picture->extension;
                }
                $model->surname=$post['surname'];
                $model->name=$post['name'];
                $model->middle_name=$post['middle_name'];
                $model->login=$post['login'];
                $model->password=Yii::$app->getSecurity()->generatePasswordHash($post['password']) ;
                $model->brithday=$post['brithday'];
                $model->tel=$post['tel'];
                $model->suroga=$post['suroga'];
                $model->user_id=$post['user_id'];

               
                $model->save();

                

                return $this->refresh();
                 

            }
           
            else{

            	
                return $this->render('insert_persons', [
                    'model'     =>  $model,
                    'users' => $users,
                    'save' => $save

                ]);
            }

        }
        else{
            return $this->render('insert_persons', [
                'model'     =>  $model,
                'users' => $users,
                'save' => $save
            ]);
        }
    }

    public function actionInsertStorage()
    {
        $model = new Storage();
        $category = Category::getCate();
        ///$menu = Menu::getMenus();

        if( \Yii::$app->getRequest()->isPost ){

            if( $model->load( \Yii::$app->request->post() )){

                $model->picture = UploadedFile::getInstance($model,'picture');
                $post=Yii::$app->request->post('Storage');
                if($model->picture){
                    $dir = 'image/';
                    $path = $model->picture->baseName.'.'.$model->picture->extension;
                    $model->picture->saveAs($dir.md5($path).".".$model->picture->extension);
                    $model->picture=$dir.md5($path).".".$model->picture->extension;
                }

                $model->product_name=$post['product_name'];
                $model->first_price=$post['first_price'];
                $model->selling_price=$post['selling_price'];
                $model->id_category=$post['id_category'];
                //$model->id_menu=$post['id_menu'];
                $model->data=date('Y-m-d');
                $model->time=date('H:i:s');


                $model->save();
                if($model->save()){
                    $save = 1;
                }

                return $this->render('insert_dishes', [
                    'model'     =>  $model,
                    'category' => $category,
                    'menu'=>$menu,
                    'save'=>$save,
                ]);

            }
            else{
                return $this->render('insert_dishes', [
                    'model'     =>  $model,
                    'category' => $category,
                    'menu'=>$menu,

                ]);
            }

        }
        else{
        }

        return $this->render('insert_dishes',['model'=>$model,'category'=>$category,'menu'=>$menu]);
    }


    public function actionUpdateStorage(){
        $model = new Storage();
        $category = Category::getCate();
        if( \Yii::$app->request->post()){
            $model = Storage::update_storage(\Yii::$app->session['id_storage']);
            $post=Yii::$app->request->post('Storage');

           
            $picture = UploadedFile::getInstance($model, 'picture');
            if (!empty($picture)) {
                $model->picture = UploadedFile::getInstance($model, 'picture');
                if ($model->picture and $model->picture <> " ") {
                    $dir = 'image/';
                    $path = $model->picture->baseName . '.' . $model->picture->extension;
                    $model->picture->saveAs($dir . md5($path) . "." . $model->picture->extension);
                    $model->picture = $dir . md5($path) . "." . $model->picture->extension;
                }
            }
            $model->product_name=$post['product_name'];
            $model->first_price=$post['first_price'];
            $model->selling_price=$post['selling_price'];
            $model->id_category=$post['id_category'];
            $model->quantity=$post['quantity'];
            $model->data=date('Y-m-d');
            $model->time=date('H:i:s');
            $model->save();
            if($model->save()){
                $save = 1;
            }
        }
        return $this->render('update_dishes',['model'=>$model,'category'=>$category, 'save'=>$save]);
    }

     public function actionAbc($id_category){
       if($id_category<>''){
        $model = new Storage();
        $Storage = Storage::getStorage($id_category);

        $form = ActiveForm::begin();
        $items = ArrayHelper::map($Storage, 'id_storage', 'product_name');
        $params = [
            'prompt' => 'Интихои мол...',
            'onchange'=>'$.get("index.php?r=admin/default/update_d&id_storage="+$(this).val(), function(data){$("#update").html(data);})'                    ];
                    echo $form->field($model, 'id_category')->dropDownList($items, $params, ['class' => 'form-control', 'style' => 'border-radius:4px; width:100%'])->label(false);
                    ActiveForm::end();

    }}
    public function actionUpdate_d($id_storage){
        $model = new Storage();

        if( \Yii::$app->getRequest()->isPost ){

        }
        else{

        if($id_storage<>''){
            $category = Category::getCate();
            //$menu = Menu::getMenus();
            $storage=Storage::getName_storage($id_storage);
            $model = new Storage();
            $session=\Yii::$app->session;
            $session['id_storage']=$id_storage;

            $form = ActiveForm::begin(['action' => 'index.php?r=admin/default/update-storage',]);
            echo $form->field($model, 'product_name')->textInput(['placeholder' => 'Номи маҳсулот','value'=>$storage[0]['product_name']]);
            echo $form->field($model, 'first_price')->textInput(['placeholder' => 'Нархи харид','value'=>$storage[0]['first_price']]);
            echo $form->field($model, 'selling_price')->textInput(['placeholder' => 'Нархи фурӯш','value'=>$storage[0]['selling_price']]);
            echo $form->field($model, 'quantity')->textInput(['placeholder' => 'Миқдор','value'=>$storage[0]['quantity']]);
            $items = ArrayHelper::map($category, 'id_category', 'name');
            $params = [
                'prompt' => 'Категорияро интихоб намоед...',
            ];
            echo $form->field($model, 'id_category')->dropDownList($items, ['options' => [$storage[0]['id_category'] => ['Selected'=>'selected']]], $params, ['class' => 'form-control select2-selection select2-selection--single', 'style' => 'border-radius:4px; width:100%']);

            echo $form->field($model, 'picture')->fileInput();
            echo '<div class="form-group">';
            echo Html::resetButton('Сбрось', ['class' => 'btn btn-default']);

            echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']);

            echo '</div>';

ActiveForm::end();


    }}}



    public function actionCash_statement(){
        return $this->render('cash_statement');
    }

    public function actionAccount($from_date,$to_date){
        $amount = SellingProduct::account($from_date,$to_date);

        echo "<table class='table table-bordered table-striped dataTable'>";
        echo "<tr><th colspan='2' style='text-align: center'>Ҳисоби хазина</th></tr>";
        echo "<tr><td style='text-align: right'>Ҳамагӣ:</td><td>".$amount[0]['sum(sum)'].'  сомонӣ'."</td></tr>";
        echo "</table";
    }

     public function actionReport_day(){
        $model = new SellingProduct();
        $category = Category::getCate();
        return $this->render('report_day',['model'=>$model, 'category'=>$category]);
    }


    public function actionGethistory($from_date,$to_date){



        $historys = SellingProduct::getHistory($from_date,$to_date);

          if(count($historys)<>0){
            echo "<table class='table table-bordered table-striped dataTable'>";
            echo "<tr><th style='text-align: center'>№</th><th style='text-align: center'>Номи маҳсулот</th>
            <th style='text-align: center'>миқдор</th>
            <th style='text-align: center'>Нархи аслӣ </th>
            <th style='text-align: center'>Нархи фурӯш</th>
            <th style='text-align: center'>Ҳамаги <br> нархи аслӣ </th>
            <th style='text-align: center'>Сумма <br> нархи фурӯш </th><th style='text-align: center'>Даромад</th></tr>";
            $r=1;
            $sum=0;
            $sum_price_cost=0;
            $sum_price_for_sale = 0;


            foreach($historys as $history){
                $pribl = $history[0]['summa'] - ($history[0]['count'] * $history[0]['first_price']);
                $sum_price = $history[0]['count'] * $history[0]['first_price'];
                echo "<tr><td style='text-align: center'>$r</td><td>".$history[0]['product_name']."</td>
                <td style='text-align: center'>".$history[0]['count']."</td>
                <td style='text-align: center'>".$history[0]['first_price']."</td>
                <td style='text-align: center'>".$history[0]['selling_price']."</td>
                <td style='text-align: center'>".$sum_price."</td>
                <td style='text-align: center'>".$history[0]['summa']."</td>
                <td style='text-align: center'>".$pribl."</td></tr>";
                $sum_price_cost = $sum_price_cost + $sum_price;
                $sum_price_for_sale = $sum_price_for_sale + $history[0]['summa'];
                $r++;
            }
            $sum = $sum_price_for_sale - $sum_price_cost;
            //$price = $price / ($r-1);
            echo "<tr><td></td><td style='text-align: right'>Ҳамагӣ:</td><td></td><td></td><td></td>
            <td style='text-align: center'><b>".$sum_price_cost.'(сомонӣ)'."</b></td>
            <td style='text-align: center'><b>".$sum_price_for_sale.'(сомонӣ)'."</b></td>
            <td style='text-align: center'><b>".$sum.'(сомонӣ)'."</b></td></tr>";
            echo "</table";}


    }


    public function actionReport_storage($id_category,$from_date,$to_date){

        if($id_category<>''){
            $model = new Storage();
            $storage = Storage::getStorage($id_category);

            // print_r($dishes);
            // exit;

            $form = ActiveForm::begin();
            $items = ArrayHelper::map($storage, 'id_storage', 'product_name');
            $params = [
                'prompt' => 'Молро интихоб намоед...',
                'onchange'=>'$.get("index.php?r=admin/default/select_storage&id_storage="+$(this).val()+"&from_date='.$from_date.'&to_date='.$to_date.'", function(data){$("#report").html(data);})'                    ];
            echo $form->field($model, 'id_storage')->dropDownList($items, $params, ['class' => 'form-control', 'style' => 'border-radius:4px; width:100%'])->label(false);
            ActiveForm::end();

        }
    }


    public function actionSelect_storage($id_storage,$from_date,$to_date){
        $historys = SellingProduct::getAll($id_storage,$from_date,$to_date);

        // debug($historys);
        // exit;

        if(count($historys)<>0){
        $count = 0;
        $summa = 0;
        $price = 0;
        echo "<table class='table table-bordered table-striped dataTable'>";
        echo "<tr><th style='text-align: center'>№</th>
        <th style='text-align: center'>Номи молҳо</th>
        <th style='text-align: center'>Миқдор</th>
        <th style='text-align: center'>Нархи фурӯш</th>
        <th style='text-align: center'>Ҳамагӣ</th>
        <th style='text-align: center'>Телефон</th>
        <th style='text-align: center'>Санаи харид</th></tr>";
        $r=1;
        foreach($historys as $history){
            echo "<tr><td style='text-align: center'>$r</td><td style='text-align: center'>".$history['product_name']."</td><td style='text-align: center'>".$history['quantity']."</td><td style='text-align: center'>".$history['selling_price']."</td><td style='text-align: center'>".$history['quantity']."</td><td style='text-align: center'>".$history['tel_client']."</td><td style='text-align: center'>".$history['selling_data']."</td></tr>";
            $count = $count + $history['quantity'];
            $amount = $amount + $history['sum'];
            $price = $price + $history['selling_price'];
            $r++;
        }

        $price = $price / ($r-1);
        echo "<tr><td></td><td style='text-align: right'>Ҳамагӣ:</td><td style='text-align: center'>$count</td><td style='text-align: center'>".$price.' сомонӣ'."</td><td style='text-align: center'>".$amount.' сомонӣ'."</td></tr>";
        echo "</table";}

    }



     public function actionBonus(){

     	$bonus = BonusTable::getBonus();

        // debug($bonus);
        // exit;

        return $this->render('bonus', compact('bonus'));
    }

}
