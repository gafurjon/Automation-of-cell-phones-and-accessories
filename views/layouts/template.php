<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Menu;
use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link rel="shortcut icon" href="<?//= \yii\helpers\Url::to('@web/image/logo.png')?>" type="image/png">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>KANDMobile</title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>K</b>Mobile</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>KAND</b>Mobile</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

           

            <span class="sr-only">Toggle navigation</span>
            </a>
            
              <? if(Yii::$app->user->identity['user_id']==2 or Yii::$app->user->identity['user_id']==3){?>
           <a href="index.php?r=kassa/default/index" style="color: #fff; padding: 14px 1px; float: left; font-size: 20px" class="fa fa-chevron-left"> Дохилкуни рақами телефон</a>
            <?php } ?>
            

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <?php
                    if(Yii::$app->user->isGuest){
                        ?>
                    <li class='dropdown user user-menu'>
                        <a href='#'>
                        


                        <span class='fa fa-user'>&nbsp&nbspДохилшавии ба сисема</span>
                        </a>

            </li>


                    <?php }
                    else
                    {
                   ?>
                      <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= yii\helpers\Url::to('@web/'.Yii::$app->user->identity['picture'])?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">

                                 <?= Yii::$app->user->identity['surname'];?>
                                 <?= Yii::$app->user->identity['name'];?>
                                 <?= Yii::$app->user->identity['middle_name'];?>

                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= yii\helpers\Url::to('@web/'.Yii::$app->user->identity['picture'])?>" class="img-circle" alt="User Image">
                                <p>
                                    <?= Yii::$app->user->identity['surname'];?>
                                    <?= Yii::$app->user->identity['name'];?>
                                    <?= Yii::$app->user->identity['middle_name'];?>
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                           <!-- <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php
                                    if(isset(Yii::$app->session['id_teacher'])){echo \yii\helpers\Url::to('@web/index.php?r=teacher/default/profile');}
                                    elseif(isset(Yii::$app->session['id_students'])){echo \yii\helpers\Url::to('@web/index.php?r=students/default/profile');}
                                    ?>" class="btn btn-default btn-flat, fa fa-key">Ивази рамз(парол)</a>
                                </div>
                                <div class="pull-right">
                                    <?php
                                    echo Nav::widget([
                                        'options' => ['class' => ''],
                                        'items' => [
                                            Yii::$app->user->isGuest ? (
                                            ['label' => 'Login', 'url' => ['@web//site/login']]

                                            ) : (
                                                '<li>'
                                                . Html::beginForm(['/site/logout'], 'post')
                                                . Html::submitButton(
                                                    ' Баромад',
                                                    ['class' => 'btn btn-default btn-flat, fa fa-power-off']
                                                )
                                                . Html::endForm()
                                                . '</li>'
                                            )
                                        ],
                                    ])

                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

               <?php }?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <?php
            if(!Yii::$app->user->isGuest){
            ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= yii\helpers\Url::to('@web/'.Yii::$app->user->identity['picture']);?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>
                        <?php
                        $users = \app\models\Users::getUserid(Yii::$app->user->identity['user_id']);
                        echo $users['name_user'];
                        ?>
                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <?php } ?>


            <!-- search form -->
<!--            <form action="#" method="get" class="sidebar-form">-->
<!--                <div class="input-group">-->
<!--                    <input type="text" name="q" class="form-control" placeholder="Search...">-->
<!--                    <span class="input-group-btn">-->
<!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>-->
<!--              </span>-->
<!--                </div>-->
<!--            </form>-->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?php
            if(!Yii::$app->user->isGuest and Yii::$app->user->identity['user_id']==1){?>
                <li class="header">Менюи асосӣ</li>
                <?=\app\components\MenuWidget::widget() ?>
           <? } ?>


            
            <? if(Yii::$app->user->identity['user_id']==2 or Yii::$app->user->identity['user_id']==3){
               

            $category = \app\models\Menu::getMenu(Yii::$app->user->identity['user_id']);
             
              foreach ($category as $menu){ 
                ?>
              <li class="treeview">
              <a href="<?=$menu['url'] ?>" onclick='<?php if($menu['url']=='#') 
              echo '$.get("index.php?r=kassa/default/menu&id_menu='.$menu['id_menu'].'", function(data){
            $("#content").html(data);})'; ?>'>
                  <i class="fa <?= $menu['ico'] ?>"></i> <span><?= $menu['page']; ?></span>
              </a>
              </li>
                  <?php }} ?>




                
            </ul>

    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="content">

        <?= $content ?>
      </div>

</div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>© 2019 KANDMOBLE, Ҳамаи ҳуқуқҳо ҳифз карда шудааст.</strong>
    </footer>

    <!-- Control Sidebar -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->





</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>

<SCRIPT Language="Javascript">
    function printit(){
        if (window.print) {
            window.print() ;
        } else {
            var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
            document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
            WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = "";
        }
    }
</script>

<script>
$("#btnmmm").click(function(){
var a = $('#txt').val();

    $.ajax({
        type: "POST",
        url: "http://localhost/kafe.tj/web/index.php?r=site/ajax",
        data: ({"matn":a}),
        success : function(data){
            alert(data);
            }

    })
    function suc ($data){

    }



});
</script>


<!---->
<!---->
<!---->
<!---->
<!--<script Language="Javascript">-->
<!---->
<!--   $('#btn-klk').on{('click'),function(-->
<!--    alert("1");-->
<!--   )}-->
<!---->
<!--</script>-->

