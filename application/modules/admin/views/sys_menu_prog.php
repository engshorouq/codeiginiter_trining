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
                    <i class="glyphicon glyphicon-list"></i> القوائم
                </div>
            </div>
            <div class="portlet-body">

                <div>
                    <!--data-toggle="modal" data-target="#category_modal"-->
                    <button class="btn btn-info new" style="margin: 5px;" onclick="javascript:create_menu();"
                            type="button">جديد
                    </button>
                    <button class="btn btn-success" onclick="javascript:edit_menu();" style="margin: 5px;"
                            type="button">تحرير
                    </button>
                    <!--<a href="<?= base_url(); ?>admin/Sys_Menus/edit_menu/" id="edit_link" class="btn btn-info">تحرير</a>-->
                    <button class="btn btn-danger" onclick="javascript:delete_menu();" style="margin: 5px;"
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

<div class="modal fade" id="menu_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 400px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-new-window">&nbsp; <span id="title">اضافة قائمة جديدة</span></li>

            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="menu_form" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Sys_menu_prog/add_menus">
                    <fieldset>
                        <input type="hidden" class="type_form" id="type_form" value="create">
                        <input type="hidden" class="parentID" name="parentID" id="parent" value="">

                        <span id="parent_name">تصنيف الأب</span>
                        <input type="text" name="parentName" class="parentName" id="parentName" value=""
                               style="border:#ffffff; color: #009999; margin-right: 50px; margin-bottom: 10px; font-size: 14px;"
                               readonly>


                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">اسم القائمة</label>

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" id="name_menu"
                                       placeholder="اسم القائمة ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url" class="col-lg-2 control-label">url</label>

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="url" id="url"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">

                                <button type="submit" style="margin-right: 400px" data-dismiss="modal" name="submit"
                                        id="submit"
                                        class="btn btn-primary">حفظ
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


<!-- for delete -->
<div class="modal fade" id="menu_delete" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 250px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-trash"></li>
                حذف التصنيف
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="menu_form_delete" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Sys_menu_prog/delete_menu">
                    <fieldset>

                        <input type="hidden" class="menu_id_delete" name="menu_id_delete" id="menu_id_delete"
                               value="">

                        <div class="form-group">
                            <label for="name" class="col-lg-6 control-label">هل تريد بالتأكيد حذف قائمة </label>

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
    clearForm($('#menu_form_delete'));

});
/* for submit button in add*/
$('button[name="submit"]').click(function (e) {

    e.preventDefault();

    var form = $(this).closest('form');
    var type_form = $('#type_form').val();
    //alert($('#type_form').val());

    //alert(type_form);
    if (type_form != 'edit') {
        ajax_insert_update(form, function (data) {

            console.log('', data);
            console.log('', $(getSelectedElementRoot()));

            var categoryCount = $('li', $(getSelectedElementRoot())).length;

            if (categoryCount <= 0) {
                $(getSelectedElementRoot()).append('<ol class="dd-list"><li class="dd-item" data-id="' + data + '"><div class="dd-handle"   ondblclick="javascript:getmenu(' + data + ');" data-displayInput="' + $('#name_menu').val() + '" >' + $('#name_menu').val() + '</div></li></ol>')

            } else {
                if (getSelectedItemID() > 0)
                    $(getSelectedElementRoot().find('ol:first')).append('<li class="dd-item" data-id="' + data + '"><div class="dd-handle"  ondblclick="javascript:getmenu(' + data + ');" data-displayInput="' + $('#name_menu').val() + '" >' + $('#name_menu').val() + '</div></li>')
                else
                    $(getSelectedElementRoot()).append('<li class="dd-item" data-id="' + data + '"><div class="dd-handle"  ondblclick="javascript:getmenu(' + data + ');" data-displayInput="' + $('#name_menu').val() + '" >' + $('#name_menu').val() + '</div></li>')


            }
            reBindHandle();
            clearForm($('#menu_form'));
        });
    } else {

        ajax_insert_update(form, function (data) {

            console.log('', data);
            $(getSelectedElement()).find('span').text($('#name_menu').val());
            $(getSelectedElement()).attr('data-class', $('#url').val())

            reBindHandle();
            clearForm($('#menu_form'));
        });

    }
})
;


function reBindHandle() {
    $('ol.dd-list li.dd-item  div.dd-handle').click(function () {
        $('ol.dd-list li.dd-item div.dd-handle').removeClass('selected');
        $(this).addClass('selected');

    });
}
reBindHandle();

function getSelectedElementRoot() {
    if (getSelectedItemID() != 0)
        return $('ol.dd-list li.dd-item div.dd-handle.selected').closest('li');
    else
        return $('#menu-root');
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
function getUrl() {
    return $('ol.dd-list li.dd-item div.dd-handle.selected').closest('div.dd-handle').attr('data-class');
}

function create_menu() {


    clearForm($('#menu_form'));
    $('#parent').val(getSelectedItemID());
    $('#type_form').val('create');

    $('#parentName').val(getSelectedItemName());
    $('#menu_modal').modal();
}
function edit_menu() {

    getmenu(getSelectedItemID());
}

function delete_menu() {
    var categoryCount = $('li', $(getSelectedElementRoot())).length;

    var count = $('li', $('#menu-root')).length;

    if (categoryCount == count) {


        alert('الرجاء تحديد تصنيف')

    } else {


        clearForm($('#menu_form_delete'));
        $('#menu_id_delete').val(getSelectedItemID());

        $('#name_delete').val(getSelectedItemName());


        $('#menu_delete').modal();
    }

}


function getmenu(id) {
    //alert(getUrl());
    var categoryCount = $('li', $(getSelectedElementRoot())).length;

    var count = $('li', $('#menu-root')).length;

    if (categoryCount == count) {

        alert('الرجاء تحديد تصنيف')

    } else {

        clearForm($('#menu_form'));
        $('#parent').val(getSelectedItemID());
        $('#parent_name').text(' ');
        $('#parentName').attr('type', 'hidden');
        $('#menu_form').closest('form').attr('action', '<?=base_url()?>admin/Sys_menu_prog/edit_menu');

        $('#menu_modal').find('li').attr('class', 'glyphicon glyphicon-edit');
        $('#title').text('تعديل التصنيف');
        $('#type_form').val('edit');
        $('#name_menu').val(getSelectedItemName());
        $('#url').val(getUrl());
        $('#menu_modal').modal();

    }
}


</script>