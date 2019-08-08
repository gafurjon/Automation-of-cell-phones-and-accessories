<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Интихоб';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php //echo Html::img(Yii::getAlias('@web').'/image/logo-orginal.jpg', ['width' => '120px']);

?>
<section class="content-header">
    <h1>
        MEGA
        <small>MOBILE</small>
    </h1>
    <?php //Yii::$app->getSecurity()->generatePasswordHash('0000'); ?>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Интихоб</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">



<div class="col-md-6" style="width:400px;margin-left:20% ;margin-top: 30px;  padding: 20px;background-color: #FFFFFF;">
        <!-- general form elements -->

            <div class="box-header with-border">
                <h3 class="box-title" style="margin-left:40%">Интихоб</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <a class="btn btn-primary btn-block btn-flat btn-lg" name="<?=$users['name_user']?>" href="<?php
                        if(isset($users['modules'])){
                            echo \yii\helpers\Url::to('@web/index.php?r='.$users['modules']);
                        }

                        ?>">

                            <?php
                            if(isset($users['name_user'])){
                                echo $users['name_user'];

                            }

                            ?></a>
                        <br>
                        <br>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary btn-block btn-flat btn-lg"
                           href="<?php echo \yii\helpers\Url::to('@web/index.php?r=kassa/default/index'); ?>">Касса</a>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div>
            </form>
    
</div>
</div>




        </section>


