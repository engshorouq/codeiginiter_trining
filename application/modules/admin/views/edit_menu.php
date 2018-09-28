<?php
include('view_header.php');?>
<div class="container-fluid">
    <?php
    /*$attribute=array('name' => 'formAdd','id' => 'formAdd','class'=>'form-horizontal','enctype' => 'multipart/form-data');
    $hidden=array('is_submit' => 1);
    echo form_open('admin/Sys_Menus/edit_menu'/*.$id*/
    //,$attribute,$hidden);

    ?>
    <form name="edit" id="edit_form" method="post" class="form-horizontal"
          enctype="multipart/form-data"
          action="<?php echo base_url(); ?>admin/Sys_Menus/edit_menu">

        <fieldset>

            <input type="hidden" class="menu_id" name="menu_id" id="menu_id" value="">


            <div class="form-group">
                <label for="menu_name" class="col-lg-2 control-label">اسم القائمة</label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="menu_name" id="menu_name">
                </div>
            </div>
            <div class="form-group">
                <label for="menu_name" class="col-lg-2 control-label">url</label>

                <div class="col-lg-6">
                    <input type="text" class="url" name="url_menu" id="url_menu" value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-2">

                    <button type="submit" data-dismiss="modal" name="edit_submit" id="edit_submit"
                            class="btn btn-primary">
                        تحرير
                    </button>
                    <button type="button" class="btn btn-cont" data-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </fieldset>
    </form>
    <?php //echo form_close(); ?>

    <?php
    /**
     * Created by PhpStorm.
     * User: abedalla
     * Date: 02/07/16
     * Time: 01:31 م
     */
    include('view_footer.php');

    ?>
