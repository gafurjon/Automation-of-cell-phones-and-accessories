<section class="content-header">
   
 

<!-- Content Wrapper. Contains page content -->
            <!-- Main content -->
        <section class="content">
          

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Кор бо бонусҳо</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th><p align='center'>#</p></th>
                        <th><p align='center'>Рақами телефон</p></th>
                        <th><p align='center'>Суммаи умумии бонус</p></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                    <?php $r=1; foreach ($bonus as $value) { ?>
                        <td><p align='center'><?=$r;?></p></td>
                        <td><?=$value['tel_client'];?></td>
                        <td><p align='center'><?=$value['bonus_sum'];?></p></td>
                       </tr>
                      <? $r++;}?>
                      </tbody>
                    <tfoot>
                      <tr>
                        <th><p align='center'>#</p></th>
                        <th><p align='center'>Рақами телефон</p></th>
                        <th><p align='center'>Суммаи умумии бонус</p></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   
</section>

  