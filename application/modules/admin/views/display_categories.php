<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<div class="parent">
    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon glyphicon-list"></i> التصنيفات
                    </div>
                </div>
                <div class="portlet-body">

                    <div>
                        <!--data-toggle="modal" data-target="#category_modal"-->
                        <button class="btn btn-info new" style="margin: 5px;" onclick="javascript:create_category();"
                                type="button">جديد
                        </button>
                        <button class="btn btn-success" onclick="javascript:edit_category();" style="margin: 5px;"
                                type="button">تحرير
                        </button>
                        <button class="btn btn-danger" onclick="javascript:delete_category();" style="margin: 5px;"
                                type="button">حذف
                        </button>

                    </div>


                    <?php echo $tree;

                    ?>



                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="modal fade" id="category_modal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
            <div class="modal-content" style=" height: 250px !important;overflow:visible;">
                <div class="modal-header">
                    <li class="glyphicon glyphicon-new-window"></li>
                    اضافة تصنيف جديد
                </div>


                <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                    <form name="formAdd" id="category_form" method="post" class="form-horizontal"
                          enctype="multipart/form-data"
                          action="<?php echo base_url(); ?>admin/Categories/add_categories">
                        <fieldset>

                            <input type="hidden" class="parentID" name="parentID" id="parent" value="">
                            <input type="hidden" class="type" name="type" id="type" value="posts">

                            تصنيف الأب<input type="text" name="parentName" class="parentName" id="parentName" value=""
                                             style="border:#ffffff; color: #009999; margin-right: 50px; margin-bottom: 10px; font-size: 14px;"
                                             readonly>


                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">التصنيف</label>

                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" id="name_cat"
                                           placeholder="اسم التصنيف">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-2">

                                    <button type="submit" data-dismiss="modal" name="submit" id="submit"
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
    <!-- the edit modal -->
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
                            <input type="hidden" class="cat_type" name="cat_type" id="cat_type" value="posts">

                            <div class="form-group">
                                <label for="cat_name" class="col-lg-2 control-label">التصنيف</label>

                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="cat_name" id="cat_name">
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

    <!-- for delete -->
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
</div>
<?php

include('view_footer.php');

?>
<script>
    /*for delete*/
    $('button[name="submit_delete"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);


        });

        $(getSelectedElement().closest('li')).remove();
        clearForm($('#category_form_delete'));

    });
    /* for submit button in add*/
    $('button[name="submit"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);
            console.log('', $(getSelectedElementRoot()));

            var categoryCount = $('li', $(getSelectedElementRoot())).length;

            if (categoryCount <= 0) {
                $(getSelectedElementRoot()).append('<ol class="dd-list"><li class="dd-item" data-id="'+data+'"><div class="dd-handle" ondblclick="javascript:getCategory('+data+');" data-displayInput="' + $('#name_cat').val() + '" >' + $('#name_cat').val() + '</div></li></ol>')

            } else {
                if (getSelectedItemID() > 0)
                    $(getSelectedElementRoot().find('ol:first')).append('<li class="dd-item" data-id="'+data+'"><div class="dd-handle" ondblclick="javascript:getCategory('+data+');" data-displayInput="' + $('#name_cat').val() + '" >' + $('#name_cat').val() + '</div></li>')
                else
                    $(getSelectedElementRoot()).append('<li class="dd-item" data-id="'+data+'"><div class="dd-handle" ondblclick="javascript:getCategory('+data+');" data-displayInput="' + $('#name_cat').val() + '" >' + $('#name_cat').val() + '</div></li>')


            }
            reBindHandle();
            clearForm($('#category_form'));
        });


    })
    ;


    /*submit for edit*/
    $('button[name="submit_edit"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);

        });

    });

    function reBindHandle() {
        $('ol.dd-list li.dd-item  div.dd-handle').click(function () {
            $('ol.dd-list li.dd-item div.dd-handle').removeClass('selected');
            $(this).addClass('selected');

        });
    }
    reBindHandle();

    function getSelectedElementRoot()
    {
        if (getSelectedItemID() != 0)
            return $('ol.dd-list li.dd-item div.dd-handle.selected').closest('li');
        else
            return $('#category-root');
    }


    function getSelectedElement() {
        return $('ol.dd-list li.dd-item div.dd-handle.selected');
    }

    function getSelectedItemID() {
        if ($('ol.dd-list li.dd-item div.dd-handle.selected').length <= 0) {
            return 0;
        } else {
            return $('ol.dd-list li.dd-item div.dd-handle.selected').closest('li.dd-item').attr('data-id');
        }
    }
    function getSelectedItemName() {
        if ($('ol.dd-list li.dd-item div.dd-handle.selected').length <= 0) {
            return " ";
        } else {
            return $('ol.dd-list li.dd-item div.dd-handle.selected').closest('div.dd-handle').attr('data-displayInput');
        }
    }

    function create_category() {

        clearForm($('#category_form'));

        $('#parent').val(getSelectedItemID());

        $('#parentName').val(getSelectedItemName());
        $('#type').val('posts');

        $('#category_modal').modal();
    }
    function edit_category() {


        getCategory(getSelectedItemID());

    }

    function delete_category() {
        var categoryCount = $('li', $(getSelectedElementRoot())).length;

        var count = $('li', $('#category-root')).length;

        if (categoryCount == count) {


            alert('الرجاء تحديد تصنيف')

        } else {


            clearForm($('#category_form_delete'));
            $('#cat_id_delete').val(getSelectedItemID());

            $('#name_delete').val(getSelectedItemName());

            $('#category_delete').modal();
        }

    }


    function getCategory(id) {
        var categoryCount = $('li', $(getSelectedElementRoot())).length;

        var count = $('li', $('#category-root')).length;

        if (categoryCount == count) {

            alert('الرجاء تحديد تصنيف')

        } else {

            clearForm($('#category_form_edit'));
            $('#cat_id').val(getSelectedItemID());

            $('#cat_name').val(getSelectedItemName());
            $('#cat_type').val('posts');
            $('#category_edit').modal();
        }
    }

</script>