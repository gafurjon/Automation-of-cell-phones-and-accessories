<?php
/**
 * Created by PhpStorm.
 * User: Хуршед
 * Date: 27.04.2017
 * Time: 15:03
 */
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Html;

?>



<section class="content">
    <div class="row">
        <div class="col-md-6">
<!-- general form elements -->
<div class="box box-primary" style="">
    <div class="box-header with-border" style="text-align: center">
        <h3 class="box-title" >Дохилкунии маҳсулот</h3>
    </div><!-- /.box-header -->
    <!-- form start -->

        <div class="box-body">
            <?php
            if(isset($save)){
                ?>

            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i>Огоҳӣ</h4>
                    Маҳсулоти нав ба анбор ворид гардид.
            </div>
            <?}?>
            <?php
            $form = ActiveForm::begin([
                'id'                          =>    'about-form',
                'method'                      =>    'post',
                'options' => [
                    'onctype' => 'multipart/form-data',
                ],
            ]); ?>



            <?= $form->field($model, 'product_name')->textInput(['placeholder' => 'Номи маҳсулот']) ?>
            <?= $form->field($model, 'first_price')->textInput(['placeholder' => 'Нарх']) ?>
            <?= $form->field($model, 'selling_price')->textInput(['placeholder' => 'Нархи фурӯш']) ?>
            
            <?= $form->field($model, 'quantity')->textInput(['placeholder' => 'Миқдори моли нав']) ?>
            
            <?php
            $items = ArrayHelper::map($category, 'id_category', 'name');
            $params = [
                'prompt' => 'Выберите категорию...',

            ];
            echo $form->field($model, 'id_category')->dropDownList($items, $params, ['class' => 'form-control select2-selection select2-selection--single', 'style' => 'border-radius:4px; width:100%']);
            // $items = ArrayHelper::map($menu, 'id_menu', 'name_menu');
            // $params = [
            //     'prompt' => 'Выберите меню...',
            // ];
            // echo $form->field($model, 'id_menu')->dropDownList($items, $params, ['class' => 'form-control select2-selection select2-selection--single', 'style' => 'border-radius:4px; width:100%']);


            ?>

            <?= $form->field($model, 'picture')->fileInput() ?>







        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="form-group">
                <?= Html::resetButton('Сбрось', ['class' => 'btn btn-default']) ?>

                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

            </div>
        </div>

</div><!-- /.box -->

                <?php ActiveForm::end(); ?>
    </div>
    </div>
</section>


