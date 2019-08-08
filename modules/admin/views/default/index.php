<section class="content-header">
    <h1>
        KAND
        <small>Mobile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Саҳифаи асосӣ</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">

<?php

if(!empty($storage)){

	$i=0;
	$r=1;
	$news='Молҳое, ки дар анбор миқдорашон кам боқӣ мондааст!!!';
	$ico='';
	$sana='';

	    ?>
		 <div class='col-md-12'>
			<div class='box box-default'>
                
                <div class='box-header with-border'>
                <div class='box-header with-border' style='background-color: red;color: white;'>
               
                  <i class='fa  fa-bullhorn'></i>
                  <h3 class='box-title'><?php echo $news;?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <div class='alert'>
                     <h4><i class='icon fa  <?php echo $ico; ?>'></i><?php echo $sana;?></h4>

	    <? foreach ($storage as $item){
    	// debug($storage);
		
		$name=$storage[$i]['product_name'];
		$quantity=$storage[$i]['quantity'];
		//$picture=$storage[$i]['picture'];
		


		// if ($rasm=='')
  //       {
		?>
           
                    <p style='text-align:justify;'><font color='black' face='Palatino Linotype' size='5px'><?php echo $r.') '.$name.' - '. $quantity.' адад боқӣ монд.';?></font></p>
               
        <?php  
        // }
     $i++;
     $r++;
 }
 ?> </div></div></div></div>
<?

 }

 else {

 	?>
	<div class='col-md-12'>
			<div class='box box-default'>
			</div>
	</div>

 	<?
 }
?> 
      
     </div>
</section>