<?
use yii\helpers\Html;
use yii\widgets\Pjax;
?>
<section class="content-header">
    <h1>
        <?= $telefon; 
        ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Бонус ин номер (<?=$bonus;?>) сомонӣ</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-7 no_print">

 <div class="box box-primary" style="">
 <div class="box-header with-border">
                  <h3 class="box-title"><?=$category['0']['name']; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div>
                <?
                  foreach($storage as $row){


                  if(Yii::$app->user->identity["user_id"]==1 or Yii::$app->user->identity["user_id"]==2) {
                      $gets = '$.get("index.php?r=kassa/default/product&id_storage=' . $row['id_storage'] . '", function(data){$("#stol").html(data);})';
                  }
                  elseif($dostup[0]['id_persons']==Yii::$app->user->id or count($dostup)==0){
                      $gets = '$.get("index.php?r=kassa/default/product&id_storage=' . $row['id_storage'] . '", function(data){$("#stol").html(data);})';
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
 <div class="col-md-5" id="stol">

 <div class="box box-primary" style="">
 <div class="box-header with-border" style="text-align: center">
                  <h3 class="box-title">';?>
                    <? echo $telefon;
              

              echo '</h3>';
              echo "<div class='pull-right'>";

              echo Html::checkbox("checkbox","false", ["class"=>"ace-switch ace-switch-2 pull-right", "id"=>"check","value"=>"this.checked"]);
              echo "<span class='lbl'></span>";
              echo "</div>";
              echo '
                </div><!-- /.box-header -->
                <table class="table table-hover">';?>

                  <?  
                   // $orders = \app\models\Order::getOrder($telefon);
                   // $dostup = \app\models\Order::find()->where('telefon='.$telefon)->asArray()->all();
                    
                  

                     echo "<tr><td>Номгӯй</td><td align='center'>Миқдор</td><td align='center'>Нарх</td><td align='center'>Ҳамагӣ</td><td></td></tr>";
              $sum = 0;
              foreach ($orders as $order) {

                      if(Yii::$app->user->identity["user_id"]==1 or Yii::$app->user->identity["user_id"]==2) {
                      $gets = '$.get("index.php?r=kassa/default/del_order&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
                      $gets_minus = '$.get("index.php?r=kassa/default/minus&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
                      $gets_plus = '$.get("index.php?r=kassa/default/plus&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';

                  }
                  elseif($dostup[0]['id_persons']==Yii::$app->user->id or count($dostup)==0){
                      $gets = '$.get("index.php?r=kassa/default/del_order&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
                      $gets_minus = '$.get("index.php?r=kassa/default/minus&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
                      $gets_plus = '$.get("index.php?r=kassa/default/plus&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
                  }
                  else {
                      $gets_minus="";
                      $gets_plus="";
                      $gets="";
                  }
//                  $gets = '$.get("index.php?r=site/del_order&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
//                  $gets_minus = '$.get("index.php?r=site/minus&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
//                  $gets_plus = '$.get("index.php?r=site/plus&id_order='.$order['id_order'].'", function(data){$("#stol").html(data);})';
                  echo "<tr><td>".$order['product_name']."</td><td align='center'><div class='fa fa-minus no_print' onclick='".$gets_minus."'></div>&nbsp<input type='text' onkeyup='' style='border: 0px' size='1' value = ".$order['count']." disabled><div class='fa fa-plus  no_print' onclick='".$gets_plus."'></div></td><td align='center'>".$order['selling_price']."</td><td align='center'>".$order['sum']."</td><td><div class='fa fa-close no_print' onclick='".$gets."'></div></td></tr>";
                  $sum = $sum + $order['sum'];
              }
              $get = '$.get("index.php?r=kassa/default/delete&checkbox="+$("#check").prop("checked")+"&payed="+$("#oplata").val(), function(data){$("#stol").html(data);})';
              echo "
        <tr><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>
        <tr><td>&nbsp</td><td>&nbsp</td><td align='right'>Итого:</td><td id='sum'>". $sum ."</td><td>&nbsp</td></tr>
        <tr><td>&nbsp</td><td></td><td  align='right'>Оплачено:</td><td><input id='oplata' onmouseup='mouseup()' onkeyup='validate(this),insertText();' style='border: 0px' type='text' name='oplata' size='3' value='0.00'></td><td>&nbsp</td></tr>
        <tr><td>&nbsp</td><td>&nbsp</td><td align='right'>Сдача:</td><td id='td1'></td><td>&nbsp</td></tr>

</table>";
              echo "<script>
function validate(inp) {
    inp.value = inp.value.replace(/[^\d,.]*/g, '')
                         .replace(/([,.])[,.]+/g, '$1')
                         .replace(/^[^\d]*(\d+([.,]\d{0,5})?).*$/g, '$1');
}

          function insertText() {
          var oplata = document.getElementById('oplata').value;
            var sum = ".$sum.";
            var summa;
            var submit = 'submit';
            summa = oplata - sum;
              document.getElementById('td1').innerHTML = summa;
              if(summa<0 || sum===0){
              document.getElementById('btn').disabled = true;
              }
              else {
              document.getElementById('btn').disabled = false;

              }


    }
          function mouseup(){
          if (document.getElementById('oplata').value=='0.00'){
          document.getElementById('oplata').value='';
          }

          }


        </script>";

              echo "<!-- /.box-body -->
<div class='box-footer no_print'><input type='submit' id='btn' class='btn btn-block btn-primary btn-lg' disabled name=submit onclick='".$get."' value='Сохранить' /></div>
 </div><!-- /.box -->
 </div><!--/.col (left) -->
</div>   <!-- /.row -->
            </section><!-- /.content -->

";
                  ?>
      
     </div>
</section>