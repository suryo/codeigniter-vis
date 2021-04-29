<style type="text/css">
  .col-md-3.col-sm-4 {
    padding: 10px;
  }
</style>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
   //This page is a result of an autogenerated content made by running test.html with firefox.
   function domo(){
    
      // Binding keys
      $('*').bind('keydown', 'Ctrl+s', function assets() {
         $('#btn_save').trigger('click');
          return false;
      });
   
      $('*').bind('keydown', 'Ctrl+x', function assets() {
         $('#btn_cancel').trigger('click');
          return false;
      });
   
     $('*').bind('keydown', 'Ctrl+d', function assets() {
         $('.btn_save_back').trigger('click');
          return false;
      });
       
   }
   
   jQuery(document).ready(domo);
</script>
<?php $this->load->view('core_template/fine_upload'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?= cclang('menu') ?>
      <small><?= cclang('update_button', cclang('menu')) ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?= cclang('home') ?></a></li>
      <li class=""><a  href="<?= site_url('administrator/menu'); ?>"> <?= cclang('menu') ?></a></li>
      <li class="active"> <?= cclang('update_button') ?></li>
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
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"> <?= cclang('menu') ?></h3>
                     <h5 class="widget-user-desc"> <?= cclang('new', cclang('menu')) ?></h5>
                     <hr>
                  </div>
                  
                   <?= form_open('administrator/menu/edit_save/'.$this->uri->segment(4), [
                      'name'    => 'form_menu', 
                      'class'   => 'form-horizontal', 
                      'id'      => 'form_menu', 
                      'method'  => 'POST'
                    ]); ?>
                    <input type="hidden" value="<?= $menu->menu_type_id; ?>" name="menu_type_id">

                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label"> <?= cclang('icon') ?> </label>

                        <div class="col-sm-8">
                           <input type="hidden" name="icon" id="icon" value="<?= $menu->icon; ?>">
                            
                          <div class="icon-preview <?= $menu->icon_color; ?>">
                            <span class="icon-preview-item"><i class="fa <?= $menu->icon; ?> fa-lg"></i></span>
                          </div>
                           <br>
                           <br>

                           <a class="btn btn-default btn-select-icon btn-flat"> <?= cclang('select_icon') ?></a>

                           <select  class="chosen  chosen-select-deselect" name="icon_color" id="icon_color" tabi-ndex="5" data-placeholder="Select Color">
                            <option value="default">Default</option>
                            <?php foreach ($color_icon as $color): ?>
                            <option value="<?= $color; ?>" <?= $menu->icon_color == $color ? 'selected' : ''; ?>><?= ucwords(str_replace('-', ' ', $color)); ?></option>
                            <?php endforeach; ?>  
                           </select>
                           
                        </div>
                    </div>
                    
                    <?php 
                   ?>

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> <?= cclang('parent') ?></label>

                        <div class="col-sm-8">
                           <select  class="form-control chosen  chosen-select-deselect" name="parent" id="parent" tabi-ndex="5" data-placeholder="Select Parent">
                            <option value=""></option>
                          
                            <?php foreach (get_menu($menu->menu_type_id) as $row): ?>
                            <option <?= $row->id == $menu->parent? 'selected="selected"' : ''; ?> value="<?= $row->id; ?>"  ><?= ucwords($row->label); ?></option>
                            <?php if (isset($row->children) and count($row->children)): ?>
                               <?php create_childern($row->children, $menu->parent, 1); ?>
                            <?php endif ?>
                            <?php endforeach; ?>  
                           </select>
                            <small class="info help-block">
                             Select one or more groups.
                          </small>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="label" class="col-sm-2 control-label"> <?= cclang('label') ?> <i class="required">*</i></label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="label" id="label" placeholder="Label" value="<?= set_value('label', $menu->label); ?>">
                           <small class="info help-block">The label of menu.</small>
                        </div>
                     </div>


                     <div class="form-group ">
                        <label for="link" class="col-sm-2 control-label"> <?= cclang('link') ?> <i class="required">*</i></label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?= set_value('link', $menu->link); ?>">
                           <small class="info help-block">The link of menu <i>Example : administrator/blog</i>.</small>
                        </div>
                     </div>

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> <?= cclang('menu_type') ?></label>

                        <div class="col-sm-8">
                            <label class="col-md-2 padding-left-0">
                            <input <?= $menu->type == 'menu' ? 'checked' : ''; ?> type="radio" name="type" class="flat-green menu_type" value="menu"> <?= cclang('menu'); ?>
                            </label>
                            <label>
                            <input <?= $menu->type == 'label' ? 'checked' : ''; ?> type="radio" name="type" class="flat-green menu_type" value="label"> <?= cclang('label'); ?>
                            </label>
                            <small class="info help-block">
                             Type Of Menu.
                          </small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> <?= cclang('group_privilage') ?></label>

                        <div class="col-sm-8">
                           <select  class="form-control chosen chosen-select" name="group[]" id="group" tabi-ndex="5" data-placeholder="Select Groups" multiple="">
                            <option value=""></option>
                            <?php foreach (db_get_all_data('aauth_groups') as $row): ?>
                            <option <?= array_search($row->id, $group_menu) !== false? 'selected="selected"' : ''; ?> value="<?= $row->id; ?>"  ><?= ucwords($row->name); ?></option>
                            <?php endforeach; ?>  
                            </select>
  
                           </select>
                            <small class="info help-block">
                             
                              group is allowed to access this menu.
                          </small>
                        </div>
                    </div>


                     <div class="message">
                     </div>
                     <div class="row-fluid col-md-7">
                        <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> <?= cclang('save_button'); ?></button>
                        <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list (Ctrl+d)"><i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?> List</a>
                        <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?></a>
                        <span class="loading loading-hide"><img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                     </div>
                  <?= form_close(); ?>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->


<div class="modal fade " tabindex="-1" role="dialog" id="modalIcon">
  <div class="modal-dialog full-width" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
       <?php $this->load->view('backend/standart/administrator/menu/partial_icon'); ?>

      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
   $(document).ready(function() {


    /*icon*/


    $('.btn-select-icon').click(function(event) {
      event.preventDefault();

      $('#modalIcon').modal('show');
    });

    $('.icon-container').click(function(event) {
       $('#modalIcon').modal('hide');
       var icon = $(this).find('.icon-class').html();

       icon = $.trim(icon);

       $('#icon').val(icon);

       $('.icon-preview-item .fa').attr('class', 'fa fa-lg '+icon);
    });

    $('#icon_color').change(function(event) {
      $('.icon-preview-item').attr('class', 'icon-preview-item '+$(this).val());
    });

    $('#find-icon').keyup(function(event) {
      $('.icon-container').hide();
      var search = $(this).val();

      $('.icon-class').each(function(index, el) {
        var str = $(this).html();
        var patt = new RegExp(search);
        var res = patt.test(str);

        if (res) {
          $(this).parent('.icon-container').show();
        }
      });
    });

    $('.category-icon').each(function(index) {
      $('#category-icon-filter').append('<option value="'+$(this).attr('id')+'">'+$(this).attr('id')+'</option>');
    });

    $('#category-icon-filter').change(function(event) {
      var type = $('#category-icon-filter').val();
      $('.category-icon').hide();
      $('.category-icon#'+type).show();

      if (type == 'all') {
        $('.category-icon').show();
      }
    });

    /*end*/

      $('input[type="radio"].flat-green').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
      });
      var menu_type = $('.menu_type');

      updateMenuType($('.menu_type[checked]').val());

      menu_type.on('ifClicked', function(event) {
          var type = $(this).val();
          updateMenuType(type);
      });

      function updateMenuType(type) {
          if (type == 'menu') {
              $('.menu-only').show();
          } else {
              $('.menu-only').hide();
          }
      }

      $('#btn_cancel').click(function() {
          swal({
                  title: "Are you sure?",
                  text: "the data that you have created will be in the exhaust!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes!",
                  cancelButtonText: "No!",
                  closeOnConfirm: true,
                  closeOnCancel: true
              },
              function(isConfirm) {
                  if (isConfirm) {
                      window.location.href = BASE_URL + 'administrator/menu';
                  }
              });

          return false;
      }); /*end btn cancel*/

      $('.btn_save').click(function() {
          $('.message').fadeOut();

          var form_menu = $('#form_menu');
          var data_post = form_menu.serialize();
          var save_type = $(this).attr('data-stype');

          $('.loading').show();

          $.ajax({
                  url: form_menu.attr('action'),
                  type: 'POST',
                  dataType: 'json',
                  data: data_post,
              })
              .done(function(res) {
                  if (res.success) {
                      if (save_type == 'back') {
                          window.location.href = BASE_URL + 'administrator/menu?act=save&res=success&id=' + res.id;
                          return;
                      }

                      $('.message').printMessage({
                          message: res.message
                      });
                      $('.message').fadeIn();

                  } else {
                      $('.message').printMessage({
                          message: res.message,
                          type: 'warning'
                      });
                      $('.message').fadeIn();
                  }

              })
              .fail(function() {
                  $('.message').printMessage({
                      message: 'Error save data',
                      type: 'warning'
                  });
              })
              .always(function() {
                  $('.loading').hide();
                  $('html, body').animate({
                      scrollTop: $(document).height()
                  }, 1000);
              });

          return false;
      }); /*end btn save*/

  }); /*end doc ready*/
</script>