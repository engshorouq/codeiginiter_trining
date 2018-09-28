<?php include('view_header.php'); ?>

<div class="row search" style="margin-top: 10px;">
    <div class="col-md-12">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="glyphicon glyphicon-camera"></i> الوسائط
                </div>
            </div>

            <div class="portlet-body">

                <div>
                    <!--data-toggle="modal" data-target="#category_modal"-->
                    <button class="btn btn-info new" style="margin: 5px; width: 200px;"
                            onclick="javascript:create_category();"
                            type="button">اضافة تصنيف جديد
                    </button>

                </div>
                <?php $parent_id = null;
                       // $parent_name=null;
                ?>

                <div class="contant_cat" style="overflow: hidden;">
                    <h4 style="text-align: center; font-size:18px;">التصنيفات الفرعية</h4>
                    <?php
                    $parent_id =$id_post;


                    //$parent_name=$name_post;

                    ?><input type="hidden" name="parent" class="parent" id="parent_id"
                             data-id="<?php echo $parent_id ?>" readonly>
                    <input type="hidden" name="parent" class="parent" id="parent_name"
                           data-displayInput="<?php //echo $parent_name ?>" readonly>
                    <a class="btn btn-info new"
                       style="position:absolute;top:65px;right: 300px;margin: 5px; width: 200px;"
                       href="<?php echo base_url(); ?>admin/Media/add_media/<?php echo $parent_id ?>">
                        اضافة وسائط</a>

                   <?php  $i = 0;
                    foreach ($rows as $row) {

                            ?>

                            <div data-id="<?php echo $row['ID'] ?>" class="item_box col-sm-6"
                                 style="position:relative;display:inline;background: rgba(177, 57, 212, 0.23);width: 300px;margin-right:20px;margin-top: 20px;height: 100px; text-align: center; padding-top: 40px;">
                                <span><?php echo $row['NAME']; ?></span>

                                <div class="overly_box"
                                     style="">
                                    <a href="javascript:delete_category(<?= $row['ID'] ?>,'<?= $row['NAME'] ?>')"><i
                                            style="margin-top: 40px;font-size: 18px;"
                                            class="glyphicon glyphicon-trash"></i> </a>
                                    <a href="javascript:edit_category(<?php echo $row['ID'] ?>)"><i
                                            style="margin-top: 40px;font-size: 18px;"
                                            class="glyphicon glyphicon-edit"></i> </a>
                                    <a href="<?php echo base_url(); ?>admin/Categories/get_category_child/<?= $row['ID']; ?>"><i
                                        style="margin-top: 40px;font-size: 18px;"
                                        class="glyphicon glyphicon-new-window"></i> </a>
                                </div>

                            </div>


                            <?php
                        ++$i;
                    }
                    ?>
                </div>
                    <span style="">------------------------------------------------------------------------------------------
                    -------------------------------------------------------------------------------------------------------
                    ------------------------------------------------ </span>

                <div class="contant" style="overflow: hidden;">
                    <h4 style="text-align: center;font-size: 18px;">الوسائط </h4>
                    <?php
                    $data = modules::run('admin/Media/display_id_cat', $parent_id);

                    $i = 0;

                    foreach ($data as $media) {


                        ?>

                        <div data-id="<?php echo $media['ID'] ?>" class="item_box col-sm-6"
                             style="position:relative;display:inline;background: #e5e5e5;width: 300px;margin-right:20px;margin-top: 20px;height: 100px; text-align: center; padding: 0px;">

                            <img src="<?php echo base_url('/' . $media['IMG']); ?>" alt="Post image"
                                 style="width: 100%;height: 100%;">

                            <div class="overly_box"
                                 style="">
                                <a href="javascript:delete_media(<?= $media['ID'] ?>,'<?= $media['TITLE'] ?>')"><i
                                        style="margin-top: 40px;font-size: 18px;"
                                        class="glyphicon glyphicon-trash"></i> </a>
                                <a href="<?php echo base_url(); ?>admin/Media/display_id/<?php echo $media['ID'] ?>/<?php echo $parent_id; ?>"><i
                                        style="margin-top: 40px;font-size: 18px;"
                                        class="glyphicon glyphicon-edit"></i> </a>

                            </div>

                        </div>


                        <?php
                        if ($i % 3 == 0) {
                            ?>

                        <?php
                        }


                        ++$i;
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="category_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 250px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-new-window"></li>اضافة تصنيف جديد
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="category_form" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Categories/add_categories">
                    <fieldset>

                        <input type="hidden" class="parentID" name="parentID" id="parentID" value="">

                        <input type="hidden" class="type" name="type" id="type" value="media">

                       <!-- <label for="parentName" class="col-lg-2 control-label">اسم الاب</label>
                        <input type="text" name="parentName" class="parentName" id="parentName" value=""
                               style="border:#ffffff; color: #009999; margin-right: 50px; margin-bottom: 10px; font-size: 14px;"
                               readonly>-->


                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">التصنيف</label>

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" id="name_cat"
                                       placeholder="اسم التصنيف">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-2">

                                <button type="submit" data-dismiss="modal" name="submit_add" id="submit_add"
                                        class="btn btn-primary">اضافة
                                </button>
                                <button type="button" class="btn btn-cont" data-dismiss="modal">اغلاق</button>

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>

</div>
<div class="modal fade" id="category_edit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 250px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-edit"></li>
                تحرير
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="category_form_edit" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Categories/edit_category">
                    <fieldset>

                        <input type="hidden" class="cat_id" name="cat_id" id="cat_id" value="">
                        <input type="hidden" class="cat_type" name="cat_type" id="cat_type" value="media">

                        <div class="form-group">
                            <label for="cat_name" class="col-lg-2 control-label">التصنيف</label>

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="cat_name" id="cat_name" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-2">

                                <button type="submit" data-dismiss="modal" name="submit_edit" id="submit_edit"
                                        class="btn btn-primary">
                                    تحرير
                                </button>
                                <button type="button" class="btn btn-cont" data-dismiss="modal">اغلاق</button>

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>

</div>
<div class="modal fade" id="category_delete" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 250px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-trash"></li>
                حذف التصنيف
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="category_form_delete" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Categories/delete_category">
                    <fieldset>

                        <input type="hidden" class="cat_id_delete" name="cat_id_delete" id="cat_id_delete" value="">

                        <div class="form-group">
                            <label for="name" class="col-lg-6 control-label">هل تريد بالتأكيد حذف تصنيف</label>

                            <div class="col-lg-4">
                                <input type="text" style="border: #ffffff; background: #ffffff;"
                                       class="form-control" name="name_delete" id="name_delete" value="" readonly>

                                <!-- <span style="background: #ffffff; border: #ffffff;"  name="name_delete" id="name_delete"></span>-->

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-2">

                                <button type="submit" name="submit_delete" data-dismiss="modal" id="submit_delete"
                                        class="btn btn-primary">حذف
                                </button>
                                <button type="button" class="btn btn-cont" data-dismiss="modal">اغلاق</button>

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>

</div>
<div class="modal fade" id="media_delete" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 250px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-trash"></li>
                حذف
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="media_form_delete" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Media/delete_post">
                    <fieldset>

                        <input type="hidden" class="media_id" name="media_id" id="media_id" value="">

                        <div class="form-group">
                            <label for="name" class="col-lg-6 control-label">هل تريد باالتأكيد حذف</label>

                            <div class="col-lg-4">
                                <input type="text" style="border: #ffffff; background: #ffffff;"
                                       class="form-control" name="media_title" id="media_title" value="" readonly>

                                <!-- <span style="background: #ffffff; border: #ffffff;"  name="name_delete" id="name_delete"></span>-->

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-2">

                                <button type="submit" name="submit_delete_media" data-dismiss="modal" id="submit_delete"
                                        class="btn btn-primary">حذف
                                </button>
                                <button type="button" class="btn btn-cont" data-dismiss="modal">اغلاق</button>

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>

</div>


<?php include('view_footer.php'); ?>

<script>
    function getID() {
        return $('#parent_id').attr('data-id');
    }
    function getName() {
        return $('#parent_name').attr('data-displayInput');
    }
    /* /////////////////////////////////////////////////////////////////////////////// */
    $('button[name="submit_add"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);
            /*console.log('', $(getSelectedElementRoot()));*/
            $('div.contant_cat').append('<div id-data="' + data + '" class="item_box col-sm-6" style="position:relative;display:inline;background: #e5e5e5;width: 300px;margin-right:20px;margin-top: 20px;height: 100px; text-align: center; padding-top: 40px;">' + $('#name_cat').val() + '<div class="overly_box"><a href="javascript:delete_category(' + data + ');"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-trash"></i> </a><a href="javascript:edit_category(' + data + ')"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-edit"></i> </a><a href="<?php echo base_url(); ?>admin/Categories/get_category_child/' + data + '/'+$('#name_cat').val()+'"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-new-window"></i> </a></div></div>');

            clearForm($('#category_form'));
        });


    });
    $('button[name="submit_delete_media"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);


        });

        $('div[data-id="' + $('#media_id').val() + '"]').remove();
        clearForm($('#media_form_delete'));

    });

    $('button[name="submit_delete"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);


        });

        $('div[data-id="' + $('#cat_id_delete').val() + '"]').remove();
        clearForm($('#category_form_delete'));

    });

    $('button[name="submit_edit"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);
            $('div[data-id="' + $('#cat_id').val() + '"]').find('span').text($('#cat_name').val());
            clearForm($('#category_form_edit'));

        });

    });
    /////////////////////////////////////////////////////////////////////////////


    function create_category() {

        clearForm($('#category_form'));

        $('#parentID').val(getID());
        $('#parentName').val(getName());
        $('#type').val('media');
        $('#category_modal').modal();
    }
    function delete_category(id, name) {
        clearForm($('#category_form_delete'));
        $('#cat_id_delete').val(id);

        $('#cat_id_delete').prop('value', id);

        $('#name_delete').val(name);

        $('#category_delete').modal();


    }
    function delete_media(id, name) {
        clearForm($('#media_form_delete'));

        $('#media_id').val(id);

        $('#media_id').prop('value', id);

        $('#media_title').val(name);

        $('#media_delete').modal();


    }
    function edit_category(id) {
        clearForm($('#category_form_edit'));
        $('#cat_id').val(id);
        $('#cat_id').prop('value', id);
        var name = $('div[data-id="' + id + '"]').find('span').text();
        $('#cat_name').val(name);
        $('#cat_type').val('media');
        $('#category_edit').modal();
    }
</script>