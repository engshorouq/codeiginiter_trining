<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/Group_Menus/delete_group_menu">
    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon"></i>مجموعة الصلاحيات
                    </div>
                </div>
                <div class="portlet-body ">
                    <div class="form-horizontal">
                        <button type="submit" style="margin: 20px;" name="submit" class="btn btn-success">حفظ</button>
                        <div class="clearfix"></div>


                        <div style="position: relative;z-index: 1;" class="col-lg-6">
                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">المجموعات</label>

                                <div class="col-lg-8">
                                    <select class="form-control" id="group" name="group">
                                        <?php
                                        $rows=Modules::run('admin/Groups/display');
                                        //var_dump($rows);?>

                                        <option value="0" selected></option>

                                        <?php foreach($rows as $row){ ?>
                                        <option value="<?=$row['ID']?>"><?=$row['GROUPNAME']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div   style="">
                            <div class="form-group" style="" class="col-lg-6">
                                <div style="">
                                <label style="font-size: 18px;" for="select" class="col-lg-2 control-label">القوائم</label><br>

                                </div>

                                <div class="col-lg-6" id="menus" style="padding-right:100px;padding-top:10px;border-right: 1px dashed rgba(105, 115, 114, 0.38);">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="clearfix"></div>



<?php include('view_footer.php'); ?>
<script>
    $('#group').change(function(){

        get_data('<?=base_url('admin/Sys_menu_prog/display')?>',{group_id:$(this).val()},function(data){
            console.log('',data);
           $('#menus').html(data);
        },'html');

    });
</script>