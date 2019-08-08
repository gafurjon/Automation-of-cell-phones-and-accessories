<?php
/**
 * Created by PhpStorm.
 * User: Хуршед
 * Date: 30.04.2017
 * Time: 02:49
 */
use kartik\date\DatePicker;
?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary" style="">
                <div class="box-header with-border" style="text-align: center">
                    <h3 class="box-title" >Ҳисоби хазина</h3>
                    <br>
                    <br>
                    <div class="col-md-12" style="text-align: left">
                    <?php
                    echo '<label class="control-label">Санаро интихоб намоед</label>';
                    echo DatePicker::widget([
                        'name' => 'from_date',
                        'value' => date('Y-m-d'),
                        'type' => DatePicker::TYPE_RANGE,
                        'name2' => 'to_date',
                        'value2' => date('Y-m-d'),
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd',

                        ],
                        'options' => ['onchange'=>'$.get("ndex.php?r=admin/default/account&from_date="+$("#w0").val()+"&to_date="+$("#w0-2").val(), function(data){
            $("#date").html(data);})'],
                        'options2' => ['onchange'=>'$.get("ndex.php?r=admin/default/account&from_date="+$("#w0").val()+"&to_date="+$("#w0-2").val(), function(data){
            $("#date").html(data);})']
                    ]);
                    ?>
                    </div>
                    </div>

                    <div id="date" class="box-body">

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <div class="form-group">

                        </div>
                    </div>

                </div><!-- /.box -->


            </div>
        </div>
</section>
