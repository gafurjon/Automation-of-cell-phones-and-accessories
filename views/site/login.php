<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Дохилшавии ба система';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php //echo Html::img(Yii::getAlias('@web').'/image/logo-orginal.jpg', ['width' => '120px']);

?>
<section class="content-header">
    <h1>
       KAND
        <small>Mobile</small>
    </h1>
<?php //Yii::$app->getSecurity()->generatePasswordHash('0000'); ?>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Дохилшавии ба сисема</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
	
	<?php echo $user->persons_status;?>

        <section class="col-lg-12 connectedSortable">
            <div class="col-md-12">

                <div style=" width:400px;margin-left:20% ;margin-top: 30px;  padding: 20px;background-color: #FFFFFF;">
                    <h5 style="text-align: center;"><b>
                            Барои оғози сессия ворид шавед</b>
                    </h5>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
       //'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n<div class=\"col-lg-14 \">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-8 control-label'],
        ],
    ]); ?>

                    <?php //print_r($model->errors);  ?>
                    <div class="form-group has-feedback">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=>'form-control','placeholder'=>'Логин'])->label(false); ?>
                        <span class="fa fa-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','placeholder'=>'Парол'])->label(false) ?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

        <?php /*$form->field($model, 'rememberMe')->checkbox([
            //'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) */

        ?>

                    <div class="row">
                        <div class="col-xs-12">

                        <?= Html::submitButton('Воридшавӣ', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
        </section><!-- /.content --></section>

</div>
