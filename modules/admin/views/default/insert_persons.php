<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;



?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary" style="">
                <div class="box-header with-border" style="text-align: center">
                    <h4>Воридкуни коргар</h4>
                </div>
                <div class="box-body">

<?php
$form = ActiveForm::begin([
    'id'                          =>    'about-form',
    'method'                      =>    'post',
    'options' => [
        'onctype' => 'multipart/form-data',
    ],
]); ?>

<?= $form->field($model, 'surname')->textInput(['placeholder' => 'Насаб']) ?>

<?= $form->field($model, 'name')->textInput(['placeholder' => 'Ном']) ?>

<?= $form->field($model, 'middle_name')->textInput(['placeholder' => 'Номи падар']) ?>

<?= $form->field($model, 'login')->textInput(['placeholder' => 'Логин']) ?>

<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Парол']) ?>
<?php ?>




                       <?php
                       echo '<label class="control-label" for="user-brithday">Санаи таваллуд</label>';
                       echo DatePicker::widget([
                           'model' => $model,
                           'attribute' => 'brithday',
                           'name' => 'dp_1',
                           'type' => DatePicker::TYPE_INPUT,
                           'options' => ['placeholder' => 'Интихоби рӯзи таваллуд ...'],
                           'pluginOptions' => [
                               'autoclose'=>true,
                               'format' => 'yyyy-mm-dd'
                           ]
                       ]);
                       ?>
                        <div class="help-block"></div>
                        <?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99-999-99-99']) ?>
                        <?= $form->field($model, 'suroga')->textInput(['placeholder' => 'Суроға']) ?>
                        <?php
                        $items = ArrayHelper::map($users, 'id_user', 'name_user');
                        $params = [
                        'prompt' => 'Дастрасии ба система...',

                        ];
                        echo $form->field($model, 'user_id')->dropDownList($items, $params, ['class' => 'form-control select2-selection select2-selection--single', 'style' => 'border-radius:4px; width:100%']);?>
                        <?= $form->field($model, 'picture')->fileInput() ?>



<div class="box-footer">
    <div class="form-group">


    </div>
    <div class="form-group">
        <?= Html::resetButton('Сбрось', ['class' => 'btn btn-default']) ?>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

    </div>
</div>

    </div>
    </div>
    </div>
    </div>
    </section>
<?php ActiveForm::end(); ?>

