<?
use yii\helpers\Html;
use yii\widgets\Pjax;
?>
<section class="content-header">
    <h1>
       <?= $telefon=\Yii::$app->request->get('telefon'); 
        ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Бонус ин номер (10) сомонӣ</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-8 no_print">

 <div class="box box-primary" style="">
 <div class="box-header with-border">
                  <h3 class="box-title"><?=$category['0']['name']; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div>
                <?
                  foreach($storage as $row){


                  if(Yii::$app->user->identity["user_id"]==1 or Yii::$app->user->identity["user_id"]==2) {
                      $gets = '$.get("index.php?r=site/taom&id_storage=' . $row['id_storage'] . '", function(data){$("#stol").html(data);})';
                  }
                  elseif($dostup[0]['id_persons']==Yii::$app->user->id or count($dostup)==0){
                      $gets = '$.get("index.php?r=site/taom&id_storage=' . $row['id_storage'] . '", function(data){$("#stol").html(data);})';
                  }
                  else {
                      $gets="";
                  }
                  echo "<div class='col-md-3' style='border-radius: 4px'>
                <div onclick='"; echo $gets."'"; echo ' class="box-body" style="background-image: url('.\yii\helpers\Url::to('@web/'.$row["picture"]).'); background-size:cover; background-position: center; width: auto; height: 113px;border-radius: 4px;)"></div>
                 <div class="box-footer no_print" style="padding: 2px;"><div class="col-xs-10" style="padding-right: 0px; padding-left: 0px;">'.$row['product_name'].'</div><div class="col-xs-2" style="text-align: right;padding-right: 0px; padding-left: 0px;">'.$row['selling_price'].'</div></div>
                 </div>';
              }
              echo '</div>
                </div><!-- /.box-body -->
 </div><!-- /.box -->
 </div><!--/.col (left) -->
 <div class="col-md-4" id="stol">

 <div class="box box-primary" style="">
 <div class="box-header with-border" style="text-align: center">
                  <h3 class="box-title">';?>