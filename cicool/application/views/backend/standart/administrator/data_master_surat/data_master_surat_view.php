
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Data Master Surat      <small><?= cclang('detail', ['Data Master Surat']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/data_master_surat'); ?>">Data Master Surat</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Data Master Surat</h3>
                     <h5 class="widget-user-desc">Detail Data Master Surat</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_data_master_surat" id="form_data_master_surat" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Surat </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->id_surat); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">No Surat </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->No_surat); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan Surat </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->keterangan_surat); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kepada </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->kepada); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Alamat </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->Alamat); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->tanggal); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tempat </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->tempat); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kepala Desa </label>

                        <div class="col-sm-8">
                           <?= _ent($data_master_surat->kepala_desa); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('data_master_surat_update', function() use ($data_master_surat){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit data_master_surat (Ctrl+e)" href="<?= site_url('administrator/data_master_surat/edit/'.$data_master_surat->id_surat); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Data Master Surat']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/data_master_surat/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Data Master Surat']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->