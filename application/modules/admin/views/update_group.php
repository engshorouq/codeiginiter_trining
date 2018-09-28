
<?php
include('view_header.php');?>
<div class="container-fluid">

    <?php
    $attribute=array('name' => 'formAdd','id' => 'formAdd','class'=>'form-horizontal','enctype' => 'multipart/form-data');
    $hidden=array('is_submit' => 1);
    echo form_open('admin/Groups/display_id/'.$id,$attribute,$hidden);

    ?>
    <fieldset>
        <legend style="width: 1000px;">تعديل المنشور</legend>
        <?php foreach($result as $row){?>
        <div style="position: relative;z-index: 1;">
            <div class="form-group">
                <input type="hidden" value="<?=$row['ID']?>" name="id">
                <label for="inputTitle" class="col-lg-2 control-label">اسم المجموعة</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="title" id="inputTitle" value="<?=$row['GROUPNAME']?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-2">

                    <button type="submit" name="submit" id="submit" class="btn btn-primary">تعديل</button>
                    <a href="<?=base_url()?>admin/Groups/" class="btn btn-default">الغاء</a>

                </div>
            </div>
        </div>


    </fieldset>
<?php
}
echo form_close(); ?>

    <?php
    /**
     * Created by PhpStorm.
     * User: abedalla
     * Date: 02/07/16
     * Time: 01:31 م
     */
    include('view_footer.php');

    ?>
