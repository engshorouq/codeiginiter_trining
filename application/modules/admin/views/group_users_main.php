<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/Group_Users/delete_group_user">
    <div class="row search" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon"></i> مجموعة المستخدمين
                    </div>
                </div>
                <div class="portlet-body ">
                    <div class="form-horizontal">
                        <button type="submit" style="margin: 20px;" name="submit" class="btn btn-success">حفظ</button>
                        <div class="clearfix"></div>


                        <div style="position: relative;z-index: 1;" class="col-lg-6">
                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">المستخدمين</label>

                                <div class="col-lg-8">
                                    <?php

                                    $groups=Modules::run('admin/Users/display_users_group');
                                    //var_dump($groups);
                                    ?>
                                    <select class="form-control" id="group" name="user">


                                        <option value="0" selected></option>

                                        <?php foreach($groups as $group){ ?>
                                            <option value="<?=$group['ID']?>"><?=$group['FULLNAME']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div   style="">
                            <div class="form-group" style="" class="col-lg-6">
                                <div style="">
                                    <label style="font-size: 18px;" for="select" class="col-lg-2 control-label">المجموعات</label><br>

                                </div>

                                <div class="col-lg-6" id="menus" style="padding-right:100px;padding-top:10px;border-right: 1px dashed rgba(105, 115, 114, 0.38);">
                                    <o style="list-style: none;">
                                        <?php
                                        foreach($rows as $row){
                                            //$rows=Modules::run('admin/Group_Users/get_id',$id);
                                            ?>
                                            <li><input type="checkbox" name="group[]" value="<?=$row['ID']?>" class="check">
                                                &nbsp; &nbsp;<label for="user" class="control-label"><?=$row['GROUPNAME']?>
                                            </li>
                                        <?php } ?>
                                    </o>

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

       get_data('<?=base_url('admin/Groups/display_user_menu')?>',{user_id:$(this).val()},function(data){

            $('#menus').html(data);

        },'html');

    });
</script>