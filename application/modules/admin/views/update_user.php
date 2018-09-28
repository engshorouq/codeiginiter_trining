
<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 01:31 م
 */
include('view_header.php');?>
<div class="container">

    <?php
    $attribute=array('name' => 'formAdd','id' => 'formAdd','class'=>'form-horizontal','enctype' => 'multipart/form-data');
    $hidden=array('is_submit' => 1);
    echo form_open('admin/Users/display_id/'.$id,$attribute,$hidden);

    ?>
    <fieldset>
        <legend style="width: 1000px;">تعديل بيانات المستخدم</legend>

        <?php
        $active="";
        foreach($rows as $row){?>

        <div class="form-group">
            <input type="hidden" value="<?=$row['ID']?>" name="id">
            <label for="fullName" class="col-lg-2 control-label">الاسم كامل</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="fullName" id="fullName" value="<?=$row['FULLNAME']?>">
            </div>
        </div>

        <div class="form-group">
            <label for="keyWords" class="col-lg-2 control-label">كلمة السر</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="password"  value="<?=$row['PASSWORD']?>" id="keyWords">
            </div>
        </div>

        <div class="form-group">
            <label for="active" class="col-lg-2 control-label"> نشط</label>
            <div class="col-lg-6">
                <select class="form-control" id="active" name="active">
                    <option <?php if($row['ISACTIVE']==1){echo "selected";} ?>  value="1">نعم</option>
                    <option <?php if($row['ISACTIVE']==0){echo "selected";} ?> value="0">لا</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">

                <button type="submit" name="submit" id="submit" class="btn btn-primary">تعديل</button>
                <a href="<?=base_url()?>admin/Users/" class="btn btn-default">الغاء</a>

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
