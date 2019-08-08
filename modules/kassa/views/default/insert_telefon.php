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
                    <h3 class="box-title" >Рақами телефонро ворид намоед!!!</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

               <div class="box-body">
           <?= Html::beginForm(['default/category','telefon' => $id], 'get', ['enctype' => 'multipart/form-data']) ?>
                
                <div class="form-group field-order-telefon">
                <label class="control-label" for="order-telefon">Телефон</label>

                <input type="text" telefon="order-telefon" class="form-control" name="telefon" placeholder="Рақами телефон">

                <div class="help-block"></div>
                </div>              
                <div class="box-footer">
                    <div class="form-group">
                        <button type="reset" class="btn btn-default">Сбрось</button>
                        <button type="submit" class="btn btn-primary pull-right">>>>> Ба пеш</button>
                    </div>
                </div>
             

            </div><!-- /.box -->

           <?= Html::endForm() ?>
        </div>
    </div>
</section>


