<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/Messages/search">
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

                        <div class="form-group col-md-4" style="margin-top: 20px;">
                            <label class="control-label col-md-4">العنوان</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="title" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4" style="margin-top: 20px;">
                            <label class="control-label col-md-4">المحتوى</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="body" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4" style="margin-top: 20px;">
                            <label class="control-label col-md-5">البريد الالكتروني</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input name="email" type="text" class="form-control">
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
                        <div class="form-group col-md-4" style="margin-top: 20px;">
                            <label class="control-label col-md-4">التاريخ من </label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="date_from" type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4" style="margin-top: 20px;">
                            <label class="control-label col-md-4"> التاريخ الى </label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input name="date_to" type="date" class="form-control">
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


    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon glyphicon-list"></i> عرض الرسئل
                    </div>
                </div>
                <div class="portlet-body ">

                    <div class="form-horizontal">


                        <table id="tbl" class="table table-hover table-striped table-bordered dataTable"
                               style="margin-top: 0px;">
                            <tr>

                                <th style="width: 35px;">#</th>
                                <th>الاسم </th>
                                <th>العنوان</th>
                                <th>البريد الالكتروني</th>
                                <th>تاريخ الارسال</th>
                                <th style="width: 60px;">التفاصيل</th>
                            </tr>
                            <?php
                            $count = 0;
                            foreach ($rows as $row) {
                                ?>
                                <tr data-id="<?=$row['ID'];?>">
                                    <td style="width: 35px;"><?= ++$count; ?></td>
                                    <td><span class="name"><?= $row['NAME'] ?></span></td>
                                    <input type="hidden" class="body" value="<?=$row['BODY']?>">
                                    <td><span class="title"><?=$row['SUBJECT']?></span></td>
                                    <td><span class="email"><?=$row['EMAIL']?></span></td>
                                    <td><?=$row['CREATEDATE']?></td>
                                    <td><a class="btn btn-info" href="javascript:display(<?=$row['ID']?>)">التفاصيل</a></td>


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

<div class="modal fade" id="message" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" ">
        <div class="modal-content" style=" ">
            <div class="modal-header">
                <li class="glyphicon glyphicon-new-window"></li>&nbsp; تفاصيل الرسالة
                       </div>


            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">
                <form id="message_content" name="form" method="post" action="">
                    <fieldset>
                        <div class="form-group col-md-8" style="margin-top: 20px;">
                            <label class="control-label col-md-5">اسم المرسل </label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="name" type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-8" style="margin-top: 20px;">
                            <label class="control-label col-md-5">البريد الالكتروني</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="email" type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-8" style="margin-top: 20px;">
                            <label class="control-label col-md-5">عنوان الرسالة</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="title" type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-8" style="margin-top: 20px;">
                            <label class="control-label col-md-5">محتوى الرسالة</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <textarea id="body" class="form-control" value="" readonly></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-2">

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
  function display(id){
      clearForm($('#message_content'));
      /*for remove all done classes in the table and then add anew class to tr */
      $('tr.done',$('#tbl')).removeClass('done');

      $('tr[data-id="'+id+'"]').closest('tr').addClass('done');
      var name=$('.done').closest('tr').find('.name').text();
      $('#name').val('');
      $('#name').val(name);

     var email= $('.done').closest('tr').find('.email').text();
      $('#email').val('');
      $('#email').val(email);

      var title=$('.done').closest('tr').find('.title').text();
      $('#title').val('');
      $('#title').val(title);

      var body=$('.done').closest('tr').find('.body').val();
      $('#body').val('');
      $('#body').val(body);

      $('#message').modal();
  }
</script>