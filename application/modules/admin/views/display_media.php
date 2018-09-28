<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>

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
                            type="button">اضافة تصنيف رئيسي جديد
                    </button>
                </div>
                <div class="contant" style="overflow: hidden;">
                    <?php
                    $rows = Modules::run('admin/Categories/display_media');
                    $i = 0;
                    foreach ($rows as $row) {
                        ++$i;

                        ?>

                        <div data-id="<?php echo $row['ID'] ?>" class="item_box col-sm-6"
                             style="position:relative;display:inline;background: rgba(131, 76, 183, 0.37);width: 300px;margin-right:20px;margin-top: 20px;height: 100px; text-align: center; padding-top: 40px;">
                            <div class="visual">
                                <i class="fa fa-camera" style="font-size: 40px;float: right;opacity: 0.6;color: #FFFFFF;"></i>
                            </div>
                            <span><?php echo $row['NAME']; ?></span>
                            <div class="overly_box"
                                 style="">
                                <a href="javascript:delete_category(<?php echo $row['ID'] ?>,'<?php echo $row['NAME'] ?>');"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-trash"></i> </a>
                                <a href="javascript:edit_category(<?php echo $row['ID'] ?>)"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-edit"></i> </a>
                                <a href="<?php echo base_url();?>admin/Categories/get_category_child/<?=$row['ID'];?>/<?=$row['NAME'];?>"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-new-window"></i> </a>
                            </div>

                        </div>


                        <?php
                        if ($i % 3 == 0) {
                            ?>

                        <?php
                        }

                    }
                    ?>
                </div>
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
                اضافة تصنيف رئيسي جديد
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">

                <form name="formAdd" id="category_form" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Categories/add_categories">
                    <fieldset>

                        <input type="hidden" class="parentID" name="parentID" id="parent" value="">
                        <input type="hidden" class="type" name="type" id="type" value="media">

                        <label for="parentName" class="col-lg-2 control-label hidden">اسم الاب</label>
                        <input type="hidden" name="parentName" class="parentName" id="parentName" value=""
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
<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_footer.php');

?>
<script>
    $('button[name="submit_edit"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);
            $('div[data-id="'+ $('#cat_id').val()+'"]').find('span').text($('#cat_name').val());
            clearForm($('#category_form_edit'));

        });

    });
    $('button[name="submit_delete"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);


        });

        $('div[data-id="'+ $('#cat_id_delete').val()+'"]').remove();
        clearForm($('#category_form_delete'));

    });


    $('button[name="submit"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);
            /*console.log('', $(getSelectedElementRoot()));*/
            $('div.contant').append('<div id="'+data+'" class="item_box col-sm-6" style="position:relative;display:inline;background: rgba(131, 76, 183, 0.37);width: 300px;margin-right:20px;margin-top: 20px;height: 100px; text-align: center; padding-top: 40px;"><div class="visual"><i class="fa fa-camera" style="font-size: 40px;float: right;opacity: 0.6;color: #FFFFFF;"></i></div><span>'+$('#name_cat').val()+'</span><div class="overly_box"><a href="javascript:delete_category('+data+');"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-trash"></i> </a><a href="javascript:edit_category('+data+')"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-edit"></i> </a><a href="<?php echo base_url();?>admin/Categories/get_category_child/'+data+'"><i style="margin-top: 40px;font-size: 18px;" class="glyphicon glyphicon-new-window"></i> </a></div></div>');

            clearForm($('#category_form'));
        });


    });
    /*function getItem(){
        return $('div.move').parent().closest('div.item_box');
    }*/
    function getID(){
        return $('div.move').parent().closest('div.item_box').attr('id');
    }
    function getName(){
        return $('div.move').parent().closest('div.item_box').find('span').text();
    }

    function create_category() {

        clearForm($('#category_form'));

        $('#parent').val('0');
        $('#type').val('media');

        $('#category_modal').modal();
    }
    function delete_category(id,name){
            clearForm($('#category_form_delete'));
            $('#cat_id_delete').val(id);

        $('#cat_id_delete').prop('value',id);

            $('#name_delete').val(name);

            $('#category_delete').modal();


    }
    function edit_category(id){
        clearForm($('#category_form_edit'));
        $('#cat_id').val(id);
        $('#cat_id').prop('value',id);
        var name=$('div[data-id="'+id+'"]').find('span').text();
        $('#cat_name').val(name);
        $('#cat_type').val('media');
        $('#category_edit').modal();
    }
</script>
