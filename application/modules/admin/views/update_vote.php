
<?php
include('view_header.php');?>
<div class="container-fluid">

    <?php
    $attribute=array('name' => 'formAdd','id' => 'formAdd','class'=>'form-horizontal','enctype' => 'multipart/form-data');
    $hidden=array('is_submit' => 1);
    echo form_open('admin/Votes/display_id/'.$id,$attribute,$hidden);

    ?>
    <fieldset>
        <legend style="width: 1000px;">تعديل الاستفتاء</legend>
        <?php foreach($result as $row){?>
        <div style="position: relative;z-index: 1;">
            <div class="form-group">
                <input type="hidden" value="<?=$row['ID']?>" name="id">
                <label for="inputTitle" class="col-lg-2 control-label">تاريخ النشر</label>
                <div class="col-lg-6">
                    <input type="date" class="form-control" name="date" id="inputTitle" value="<?=$row['PUBLISHEDDATE']?>">
                </div>
            </div>



            <div class="form-group">
                <label for="duration" class="col-lg-2 control-label">المدة </label>

                <div class="col-lg-6">
                    <input type="text" name="duration" class="form-control" value="<?=$row['DURATION']?>">
                </div>
            </div>

            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">النشر</label>

                <div class="col-lg-6">
                    <select class="form-control" id="select" name="published">
                        <?php $select = $row['ISPUBLISHED'];
                        ?>

                        <option <?= $select == 1 ? 'selected' : '' ?> value="1">نعم</option>
                        <option <?= $select == 0 ? 'selected' : '' ?> value="0">لا</option>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-2">

                    <button type="submit" name="submit" id="submit" class="btn btn-primary">تعديل</button>
                    <button type="reset" class="btn btn-default">الغاء</button>

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
