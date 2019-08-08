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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" style="">
                <div class="box-header with-border" style="text-align: center">
                    <h3 class="box-title" >Ҳисоботи ҳаррӯза</h3>
                    <br>
                    <br>
                    <div class="col-md-4" style="text-align: center">
                        <?php
                        //echo '<label class="control-label">Выберите дату</label>';
                        echo \kartik\date\DatePicker::widget([
                        'name' => 'from_date',
                        'value' => date('Y-m-d'),
                        'type' => \kartik\date\DatePicker::TYPE_RANGE,
                        'name2' => 'to_date',
                        'value2' => date('Y-m-d'),
                        'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',

                        ],
                        'options' => ['onchange'=>'$.get("index.php?r=admin/default/gethistory&from_date="+$("#w0").val()+"&to_date="+$("#w0-2").val(), function(data){
                        $("#report").html(data);})'],
                        'options2' => ['onchange'=>'$.get("index.php?r=admin/default/gethistory&from_date="+$("#w0").val()+"&to_date="+$("#w0-2").val(), function(data){
                        $("#report").html(data);})']
                        ]);
                        ?>

                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <?php
                        $form = ActiveForm::begin();
                        $items = ArrayHelper::map($category, 'id_category', 'name');
                        $params = [
                            'prompt' => 'Интихоби категория...',
                            'onchange'=>'$.get("index.php?r=admin/default/report_storage&id_category="+$(this).val() + "&from_date="+$("#w0").val()+"&to_date="+$("#w0-2").val(), function(data){
            $("#dishes").html(data);})'



                        ];
                        echo $form->field($model, 'id_storage')->dropDownList($items, $params, ['class' => 'form-control', 'style' => 'border-radius:4px; width:100%'])->label(false);
                        ActiveForm::end();
                        ?>
                       </div>
                    <div id="dishes" class="col-md-4" style="text-align: center">
                    </div>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div id="report" class="box-body">



                </div><!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group">

                    </div>
                </div>

            </div><!-- /.box -->


        </div>
    </div>
</section>