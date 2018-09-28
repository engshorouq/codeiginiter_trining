<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/Votes/search">
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
                            <label class="control-label col-md-4">السؤال</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="question" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!--  <div class="form-group col-md-6" style="margin-top: 15px;">
                              <label class="control-label col-md-4"> تاريخ النشر</label>
                              <div class="col-md-8">
                                  <div class="input-group date datepicker" data-date-format="dd/mm/yyyy" data-date-viewmode="years">
                                      <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="glyphicon glyphicon-calendar"></i></button>
                                      </span>
                                      <input name="date" type="date" class="form-control">

                                  </div>
                              </div>
                          </div>-->
                        <div class="form-group col-md-6" style="margin-top: 20px;">
                            <label class="control-label col-md-4"> تاريخ النشر</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="date" type="date" class="form-control">
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
<form method="post" class="form-horizontal" enctype="multipart/form-data"
      action="<?php echo base_url(); ?>admin/Votes/delete_all_votes">

    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon glyphicon-list"></i>عرض الاستفتاءات
                    </div>
                </div>
                <div class="portlet-body form">

                    <div class="form-horizontal">
                        <div>


                            <a href="<?= base_url(); ?>admin/Votes/add_vote" class="test_link btn green"
                               style="color:#ffffff; text-decoration: none; margin-top: 20px;">جديد</a>
                        </div>

                        <table class="table table-hover table-striped table-bordered dataTable"
                               style="margin-top: 5px;">
                            <tr>

                                <th style="width: 30px;">#</th>
                                <th style="width: 35px;"><input type="checkbox" name="delete"></th>
                                <th>السؤال</th>
                                <th>الجواب</th>
                                <th>النشر</th>
                                <th>تاريخ النشر</th>
                                <th>المدة </th>
                                <th style="width: 65px;">تعديل</th>
                                <th style="width: 65px;">تغير حالة النشر</th>
                            </tr>
                            <?php
                            $count = 0;
                            foreach ($rows as $row) {
                                ?>
                                <tr data-id="<?=$row['ID'];?>">
                                    <td style="width: 30px;"><?= ++$count; ?></td>
                                    <th style="width: 35px;"><input type="checkbox" name="delete[]" value="<?= $row['ID'] ?>"></th>

                                    <td><?= $row['QUESTION'] ?></td>

                                    <td <?php $rs=Modules::run('admin/Votes_Details/get_vote_details',$row['ID']) ?>>
                                        <?php foreach($rs as $data){
                                            echo $data['ANSWER'].'<br>';
                                        }?>
                                    </td>

                                    <td <?php if ($row['ISPUBLISHED'] != "0") { ?>
                                        class="glyphicon glyphicon-ok"
                                    <?php
                                    } else {
                                        ?>
                                        class="glyphicon glyphicon-remove"
                                    <?php } ?>
                                        style="border: #ffffff;"></td>
                                    <td><?= $row['PUBLISHEDDATE'] ?></td>

                                    <td><?=$row['DURATION']?></td>

                                    <td style="width: 65px;">
                                        <a class="btn btn-info" href="<?php echo base_url(); ?>admin/Votes/display_id/<?= $row['ID']; ?>">تعديل</a>
                                    </td>
                                    <td style="width: 65px;">
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/Votes/update_published/<?=$row['ISPUBLISHED']?>/<?= $row['ID']; ?>">تغيير </a>
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




<?php include('view_footer.php'); ?>
<script>
    /*$('button[name="submit_delete"]').click(function (e) {

        e.preventDefault();

        var form = $(this).closest('form');

        ajax_insert_update(form, function (data) {

            console.log('', data);

            $('.select_post').closest('tr').remove();
            clearForm($('#vote_form_delete'));

        });

    });

    function delete_post(id){
        clearForm($('#vote_form_delete'));
        $('tr[data-id="'+id+'"]').removeClass('select_post');
        $('tr[data-id="'+id+'"]').addClass('select_post');
        $('#vote_id_delete').val(id);
        $('#vote_delete').modal();

    }*/
</script>