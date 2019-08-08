<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
404 Error Page
</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Саҳифаи асосӣ</a></li>
            <li><a href="#">Хатогӣ</a></li>
            <li class="active">404 error</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Маълумот хато ворид гашт.</h3>
              <p>
                Барои аз нав иҷро намудани амал
                ин тугмаро <a href="<?=\yii\helpers\Url::to('@web/index.php?r=students/default/profile')?>">пахш</a> намоед.
              </p>

            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->