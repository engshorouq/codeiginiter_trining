<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/Groups/search">
    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon glyphicon-search"></i>بحث
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-horizontal">

                        <div class="form-group col-md-6" style="margin-top: 20px;">
                            <label class="control-label col-md-4">اسم المجموعة</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="type_cat" class="type_cat" id="type_cat" value="0">

                        <div class="clearfix"></div>

                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" class="btn green" value="بحث">
                                <input type="reset" class="btn blue" value="افراغ الحقول">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="clearfix"></div>
<form method="post" id="form_delete_all_posts" class="form-horizontal" enctype="multipart/form-data"
      action="<?php echo base_url(); ?>admin/Groups/delete_all_groups">

    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon glyphicon-list"></i> عرض المجموعات
                    </div>
                </div>
                <div class="portlet-body form">

                    <div class="form-horizontal">
                        <div>

                            <a  href="javascript:delete_all_post();" id="deleteAll"
                                    name="deleteAll" class="btn red" style="margin-top: 20px;">حذف المختار
                            </a>
                            <a href="<?= base_url(); ?>admin/Groups/add_group" class="test_link btn green"
                               style="color:#ffffff; text-decoration: none; margin-top: 20px;">جديد</a>
                        </div>

                        <table class="table table-hover table-striped table-bordered dataTable"
                               style="margin-top: 5px;">
                            <tr>

                                <th style="width: 35px;">#</th>
                                <th style="width: 40px;"><input type="checkbox" name="delete"></th>
                                <th>اسم المجموعة</th>
                                <th style="width: 60px;">تعديل</th>
                                <th style="width: 60px;">حذف</th>
                            </tr>
                            <?php
                            $count = 0;
                            foreach ($rows as $row) {
                                ?>
                                <tr data-id="<?= $row['ID']; ?>">
                                    <td style="width: 35px;"><?= ++$count; ?></td>
                                    <th style="width: 40px;"><input type="checkbox" name="delete[]"
                                                                    value="<?= $row['ID'] ?>"></th>

                                    <td><?= $row['GROUPNAME'] ?></td>
                                    <td style="width: 60px;">
                                        <a class="btn btn-info"
                                           href="<?php echo base_url(); ?>admin/Groups/display_id/<?= $row['ID']; ?>">تعديل</a>
                                    </td>
                                    <td style="width: 60px;">
                                        <a class="btn btn-danger"
                                           href="javascript:delete_post(<?php echo $row['ID']; ?>);">حذف</a>
                                    </td>

                                </tr>

                            <?php
                            }
                            ?>

                        </table>

                        <div class="clearfix"></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="group_delete" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 250px !important;overflow:visible;">
            <div class="modal-header">
                <li class="glyphicon glyphicon-trash"></li>
                حذف البنر
            </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">
                <form name="formAdd" id="group_form_delete" method="post" class="form-horizontal"
                      enctype="multipart/form-data"
                      action="<?php echo base_url(); ?>admin/Groups/delete_group">
                    <fieldset>

                        <input type="hidden" class="group_id_delete" name="group_id_delete" id="group_id_delete"
                               value="">
                        <!-- when delete on posts the value 1 and when delete multi posts then the value = 2 -->
                        <input type="hidden" class="" name="" id="delete" value="1">

                        <div class="form-group">
                            <label class="col-lg-6 control-label">هل تريد بتأكيد الحذف ؟</label>
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



<?php include('view_footer.php'); ?>
<script>
    $('button[name="submit_delete"]').click(function (e) {
        var type_value = $(this).closest('form').find('#delete').val();
        //alert(type_value);
        if (type_value == 1) {

            e.preventDefault();

            var form = $(this).closest('form');

            ajax_insert_update(form, function (data) {

                console.log('', data);

                $('.select_post').closest('tr').remove();
                clearForm($('#group_form_delete'));

            });
        } else if (type_value == 2) {
            e.preventDefault();
            var form = $('#form_delete_all_posts').closest('form');
            ajax_insert_update(form, function (data) {

                console.log('', data);

                $('.select_post').closest('tr').remove();

                clearForm($('#group_form_delete'));

            });

        }

    });

    function delete_all_post() {
        clearForm($('#group_form_delete'));
        $('#delete').val('2');
        $('span[class="checked"]').parent().parent().parent().removeClass('select_post');
        $('span[class="checked"]').parent().parent().parent().addClass('select_post');
        $('#group_delete').modal();

    }

    function delete_post(id) {
        clearForm($('#group_form_delete'));
        $('#delete').val('1');
        $('tr[data-id="' + id + '"]').removeClass('select_post');
        $('tr[data-id="' + id + '"]').addClass('select_post');
        $('#group_id_delete').val(id);
        $('#group_delete').modal();

    }
</script>