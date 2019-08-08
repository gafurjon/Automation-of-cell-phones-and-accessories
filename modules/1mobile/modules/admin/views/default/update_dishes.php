<?php
/**
 * Created by PhpStorm.
 * User: Хуршед
 * Date: 29.04.2017
 * Time: 22:17
 */
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;

?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary" style="">
                <div class="box-header with-border" style="text-align: center">
                    <h3 class="box-title" >Ивазкуни маълумоти маҳсулот</h3>
                    <br>
                    <br>
                    <div class="col-md-6" style="text-align: center">
                    <?php
                    $form = ActiveForm::begin();
                    $items = ArrayHelper::map($category, 'id_category', 'name');
                    $params = [
                        'prompt' => 'Интихоби категория...',
                        'onchange'=>'$.get("index.php?r=admin/default/abc&id_category="+$(this).val(), function(data){
            $("#dishes").html(data);})'



                    ];
                    echo $form->field($model, 'id_category')->dropDownList($items, $params, ['class' => 'form-control', 'style' => 'border-radius:4px; width:100%'])->label(false);
                    ActiveForm::end();
                    ?></div>
                    <div id="dishes" class="col-md-6" style="text-align: center">
                        </div>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div id="update" class="box-body">
                    <?php
                    if(isset($save)){
                        ?>

                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-info"></i>Огоҳӣ</h4>
                            Маълумоти маҳсулот иваз карда шуд.
                        </div>
                    <?}?>


                </div><!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group">

                    </div>
                </div>

            </div><!-- /.box -->

            
        </div>
    </div>
</section>