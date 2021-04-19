
<script src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/js/jquery.hotkeys.js"></script>
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
      <?= ucwords($subject); ?>
      <small>{php_open_tag_echo} cclang('detail', '<?= ucwords($subject); ?>'); {php_close_tag}</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="{php_open_tag_echo} site_url('administrator/manage-form/{table_name}'); {php_close_tag}"><?= ucwords($subject); ?></a></li>
      <li class="active">{php_open_tag_echo} cclang('detail'); {php_close_tag}</li>
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
                        <img class="img-circle" src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= ucwords($subject); ?></h3>
                     <h5 class="widget-user-desc">Detail <?= ucwords($subject); ?></h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_{table_name}" id="form_{table_name}" >
                  <?php foreach ($field_all as $input => $option): ?> 
                  <?php if ($option['input_type'] == 'file') {?>  <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> <?= ucwords(clean_snake_case($option['input_label'])); ?> </label>
                        <div class="col-sm-8">
                             {php_open_tag} if (is_image($<?= $table_name; ?>-><?= strtolower($option['input_name']); ?>)): {php_close_tag}
                              <a class="fancybox" rel="group" href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= strtolower($option['input_name']);?>; {php_close_tag}">
                                <img src="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= strtolower($option['input_name']);?>; {php_close_tag}" class="image-responsive" alt="image <?= $table_name; ?>" title="<?= $option['input_label']; ?> <?= $table_name; ?>" width="40px">
                              </a>
                              {php_open_tag} else: {php_close_tag}
                              <label>
                                <a href="{php_open_tag_echo} BASE_URL . 'administrator/manage-form/file/download/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= strtolower($option['input_name']);?>; {php_close_tag}">
                                 <img src="{php_open_tag_echo} get_icon_file($<?= $table_name; ?>-><?= strtolower($option['input_name']); ?>); {php_close_tag}" class="image-responsive" alt="image <?= $table_name; ?>" title="<?= $option['input_label']; ?> {php_open_tag_echo} $<?= $table_name; ?>-><?= strtolower($option['input_name']); ?>; {php_close_tag}" width="40px"> 
                               {php_open_tag_echo} $<?= $table_name; ?>-><?= strtolower($option['input_name']); ?> {php_close_tag}
                               </a>
                               </label>
                              {php_open_tag} endif; {php_close_tag}
                        </div>
                    </div>
                  <?php } else {?>  <div class="form-group option">               
                  <label for="content" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['input_label'])); ?> </label>

                        <div class="col-sm-8">
                           {php_open_tag_echo} _ent(${table_name}-><?= strtolower($option['input_name']); ?>); {php_close_tag}
                        </div>
                    </div>
                    <?php } ?>
                    <?php endforeach; ?>

                    <br>
                    <br>

                    <div class="view-nav">
                        {php_open_tag} is_allowed('{table_name}_update', function() use (${table_name}){{php_close_tag}
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="{php_open_tag_echo} cclang('update', '{table_name}'); {php_close_tag} (Ctrl+e)" href="{php_open_tag_echo} site_url('administrator/manage-form/{table_name}/edit/'.${table_name}->{primary_key}); {php_close_tag}"><i class="fa fa-edit" ></i> {php_open_tag_echo} cclang('update', '<?= ucwords(clean_snake_case($table_name)); ?>'); {php_close_tag}</a>
                        {php_open_tag} }) {php_close_tag}
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="{php_open_tag_echo} site_url('administrator/manage-form/{table_name}/'); {php_close_tag}"><i class="fa fa-undo" ></i> {php_open_tag_echo} cclang('go_list', '<?= ucwords(clean_snake_case($table_name)); ?>'); {php_close_tag}</a>
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
