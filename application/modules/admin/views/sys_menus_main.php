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
                      action="<?php echo base_url(); ?>admin/Sys_Menus/add_menus">
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


                        <div class="form-group ">
                            <label for="url" class="col-lg-2 control-label">النشر</label>

                            <div class="col-lg-6">
                                <input type="checkbox" class="form-control" name="ispublished" id="ispublished"
                                       value="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type_menu" class="col-lg-2 control-label">مصدر الصفحة</label>

                            <div class="col-lg-6">
                                <select class="form-control" name="type_menu" id="type_menu">
                                    <option value="0" selected></option>
                                    <option value="1">صفحة</option>
                                    <option value="2">تصنيف منشور</option>
                                    <option value="3">ألبوم وسائط</option>
                                    <option value="4">فاصل</option>
                                    <option value="5">ربط خارجي</option>
                                    <option value="6">البحث</option>
                                    <option value="7">اتصل بنا</option>

                                </select>
                            </div>
                        </div>

                        <!-- hidden div for type the page-->
                        <div class="form-group" id="pages">
                            <label for="page" class="col-lg-2 control-label">الصفحة </label>

                            <div class="col-lg-6">
                                <input type="text" class="page" id="page" name="page"
                                       style="height: 29px;width: 50px;">
                                <a href="javascript:page_type();"
                                   style="color: #ffffff; margin-right: 10px;"
                                   class="btn btn-success glyphicon glyphicon-filter"></a>
                            </div>
                        </div>

                        <div id="place_cat_posts">
                        <div class="form-group" id="cat_posts">
                            <label for="cat_posts" class="col-lg-2 control-label">تصنيف المنشورات </label>

                            <div class="col-lg-6">
                                <select class="cat_posts form-control" id="cat_posts" name="url_cat"
                                        style="">
                                    <div class="cat_tree">
                                    <?php $tree = Modules::run('admin/Categories/display_sys_menu','');
                                    echo $tree;
                                    ?>
                                        </div>

                                </select>
                            </div>
                        </div>
                        </div>

                        <!-- end of hidden div for type the categories page-->
                        <!-- start of hidden div for type the categories media-->

                        <div class="form-group" id="cat_media">
                            <label for="cat_media" class="col-lg-2 control-label">تصنيف المنشورات </label>

                            <div class="col-lg-6">
                                <select class="cat_posts form-control" id="cat_media" name="url_media"
                                        style="">
                                    <?php $tree = Modules::run('admin/Categories/display_sys_menu_media');
                                    echo $tree;
                                    ?>

                                </select>
                            </div>
                        </div>

                        <!-- end of hidden div for type the categories media-->
                        <div class="form-group" id="url_menu">
                            <label for="cat_media" class="col-lg-2 control-label"> URL </label>

                            <div class="col-lg-6">
                                <input type="text" name="url" class="form-control" id="url">
                            </div>
                        </div>
                        <!-- end  -->

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
                      action="<?php echo base_url(); ?>admin/Sys_Menus/delete_menu">
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

<div class="modal fade" id="page_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 400px !important;overflow:visible;">
            <div class="modal-header">


            </div>
            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">
                <?php
                $rs = Modules::run('admin/Posts/display_pages_menu');

                ?>
                <table class="table table-hover table-striped table-bordered dataTable post_table"
                       style="margin-top: 5px;">
                    <tr>

                        <th>#</th>
                        <th><input type="radio" name="page_id"></th>
                        <th>الصورة</th>
                        <th>العنوان</th>
                    </tr>
                    <?php
                    $count = 0;
                    foreach ($rs as $row) {
                        ?>

                        <tr data-id="<?= $row['ID']; ?>">
                            <td><?= ++$count; ?></td>
                            <th><input type="radio" name="page_id" class="page_id" value="<?= $row['ID'] ?>"></th>
                            <td><img src="<?php if ($row['IMG'] != null) {
                                    echo base_url('/' . $row['IMG']);
                                } ?>" alt="Post image" style="width: 100px;height: 50px;"></td>
                            <td><?= $row['TITLE'] ?></td>
                        </tr>

                    <?php } ?>
                </table>

            </div>

        </div>
    </div>
</div>
</div>
<?php

include('view_footer.php');

?>
<script>


$('.page_id').click(function () {
    var page_id = $(this).val();
    $('#url').val(page_id);
    $('#page').val(page_id);
    $('#page_modal').removeClass('in');
});

$('#type_menu').change(function () {

    var type_val = $(this).val();
    if (type_val == '1') {
        $('#pages').show();
        $('#cat_posts').hide();
        $('#url_menu').hide();
        $('#cat_media').hide();

    }
    else if (type_val == '2') {
        $('#cat_posts').show();
        $('#pages').hide();
        $('#url_menu').hide();
        $('#cat_media').hide();
    }
    else if (type_val == '3') {

        $('#cat_media').show();
        $('#cat_posts').hide();
        $('#pages').hide();
        $('#url_menu').hide();


    }
    else if (type_val == '4') {
        $('#url').val('javascript');
        $('#cat_media').hide();
        $('#cat_posts').hide();
        $('#pages').hide();
        $('#url_menu').hide();

    }
    else if (type_val == '5') {
        $('#url_menu').find('input[name="url"]').val('');
        $('#url_menu').show();

        $('#cat_media').hide();
        $('#cat_posts').hide();
        $('#pages').hide();

    }
    else if (type_val == '6') {
        $('#url').val('javascript');
        $('#cat_media').hide();
        $('#cat_posts').hide();
        $('#pages').hide();
        $('#url_menu').hide();

    }
    else if (type_val == '7') {
        $('#url').val('javascript');
        $('#cat_media').hide();
        $('#cat_posts').hide();
        $('#pages').hide();
        $('#url_menu').hide();
    }

});
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
    var url = '';
    var type_val = parseInt($('#type_menu').val());
    console.log('',type_val);
    switch (type_val) {
        case  1:
            url=$('#page').val();

            break;
        case 2:
            url=$('select[name="url_cat"]').val();
            break;
        case 3:
            url=$('select[name="url_media"]').val();
            break;
        case 4:
            url = 'javascript';
            break;
        case 5:
            url=$('#url').val();
            break;
        case 6:
            url = 'javascript';
            break;
        case 7:
            url = 'javascript';
            break;

    }



    $('#url').val(url);



    if (type_form != 'edit') {

        ajax_insert_update(form, function (data) {

            console.log('', data);
            console.log('', $(getSelectedElementRoot()));

            var categoryCount = $('li', $(getSelectedElementRoot())).length;

            if (categoryCount <= 0) {
                $(getSelectedElementRoot()).append('<ol class="dd-list"><li class="dd-item" data-id="' + data + '"><div class="dd-handle" data-text="'+$('#type_menu').val()+'" data-order="'+$('#ispublished').val()+'"  ondblclick="javascript:getmenu(' + data + ');" data-displayInput="' + $('#name_menu').val() + '" >' + $('#name_menu').val() + '</div></li></ol>')

            } else {
                if (getSelectedItemID() > 0)
                    $(getSelectedElementRoot().find('ol:first')).append('<li class="dd-item" data-id="' + data + '"><div class="dd-handle" data-text="'+$('#type_menu').val()+'" data-order="'+$('#ispublished').val()+'"  ondblclick="javascript:getmenu(' + data + ');" data-displayInput="' + $('#name_menu').val() + '" >' + $('#name_menu').val() + '</div></li>')
                else
                    $(getSelectedElementRoot()).append('<li class="dd-item" data-id="' + data + '"><div class="dd-handle" data-text="'+$('#type_menu').val()+'" data-order="'+$('#ispublished').val()+'"  ondblclick="javascript:getmenu(' + data + ');" data-displayInput="' + $('#name_menu').val() + '" >' + $('#name_menu').val() + '</div></li>')


            }
            reBindHandle();
            clearForm($('#menu_form'));
        });
    } else {
        ajax_insert_update(form, function (data) {

            console.log('', data);
            $(getSelectedElement()).closest('div.dd-handle').find('span').text($('#name_menu').val());

            $(getSelectedElement()).closest('div.dd-handle').attr('data-class', $('#url').val());
            $(getSelectedElement()).closest('div.dd-handle').attr('data-order', $('#ispublished').val());
            $(getSelectedElement()).closest('div.dd-handle').attr('data-text', $('#type_menu').val());

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
    $('table').closest('table').find('span[class="checked"]').closest('span').removeClass('checked');
    $('#menu_form').closest('form').find('span[class="checked"]').closest('span').removeClass('checked');
    $('#title').text('اضافة تصنيف');
    $('#menu_modal').find('li').attr('class', 'glyphicon glyphicon-new-window');
    $('#menu_form').closest('form').attr('action', '<?=base_url()?>admin/Sys_Menus/add_menus');
    $('#pages').hide();
    $('#cat_posts').hide();
    $('#cat_media').hide();
    $('#parent').val(getSelectedItemID());
    $('#url_menu').hide();
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
        $('#menu_form').closest('form').attr('action', '<?=base_url()?>admin/Sys_Menus/edit_menu');
        $('#menu_form').closest('form').find('#submit').attr('name','submit_edit');
        $('#menu_modal').find('li').attr('class', 'glyphicon glyphicon-edit');
        $('#title').text('تعديل التصنيف');
        $('#type_form').val('edit');
        $('#name_menu').val(getSelectedItemName());
        var ispublished= $('ol.dd-list li.dd-item div.dd-handle.selected').closest('div.dd-handle').attr('data-order');
        if(ispublished == 1){
            $('#ispublished').parent('span').closest('span').addClass('checked');
        }else{
            $('#ispublished').parent('span').closest('span').removeClass('checked');
        }
        var typemennu=$('ol.dd-list li.dd-item div.dd-handle.selected').closest('div.dd-handle').attr('data-text');
        var url='';
        if(typemennu == 1){
            $('#type_menu').closest('select').find('option[value="1"]').attr('selected',true);
            $('#pages').show();
            $('#page').val(getUrl());
            $('.post_table').closest('table').find('tr[data-id="'+getUrl()+'"]').closest('tr').find('span').addClass('checked');
            $('#cat_posts').hide();
            $('#url_menu').hide();
            $('#cat_media').hide();

        }
        if(typemennu == 2){
            $('#type_menu').closest('select').find('option[value="2"]').attr('selected',true);
            $('#cat_posts').hide();
$('.cat_tree').remove();
                get_data('<?=base_url()?>admin/Categories/display_sys_menu_cat',{cat_id:getUrl()},function(data){
                    console.log('',data);
                    $('#cat_posts').html(data);
                },'html');


            $('#pages').hide();
            $('#url_menu').hide();
            $('#cat_media').hide();

        }
        if(typemennu == 3){
            $('#type_menu').closest('select').find('option[value="3"]').attr('selected',true);
            $('#cat_posts').hide();

            $('#pages').hide();
            $('#url_menu').hide();
            $('#cat_media').show();


        }
        if(typemennu == 4){
            $('#type_menu').closest('select').find('option[value="4"]').attr('selected',true);
            $('#cat_posts').hide();
            $('#url').val('javascript');
            $('#pages').hide();
            $('#url_menu').hide();
            $('#cat_media').hide();

        }
        if(typemennu == 5){
            $('#type_menu').closest('select').find('option[value="5"]').attr('selected',true);
            $('#cat_posts').hide();
            $('#url').val($('ol.dd-list li.dd-item div.dd-handle.selected').closest('div.dd-handle').attr('data-class'));
            $('#pages').hide();
            $('#url_menu').show();
            $('#cat_media').hide();
        }
        if(typemennu == 6){
            $('#type_menu').closest('select').find('option[value="6"]').attr('selected',true);
            $('#cat_posts').hide();
            $('#url').val('javascript');
            $('#pages').hide();
            $('#url_menu').hide();
            $('#cat_media').hide();
        }
        if(typemennu == 7){
            $('#type_menu').closest('select').find('option[value="7"]').attr('selected',true);
            $('#cat_posts').hide();
            $('#url').val('javascript');
            $('#pages').hide();
            $('#url_menu').hide();
            $('#cat_media').hide();
        }
        $('#menu_modal').modal();

    }
}
function page_type() {
    $('#page_modal').modal();
}

</script>