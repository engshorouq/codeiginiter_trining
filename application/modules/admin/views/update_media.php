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
    $attribute = array('name' => 'formAdd', 'id' => 'formAdd', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
    $hidden = array('is_submit' => 1);
    echo form_open('admin/Media/display_id/'.$id.'/'.$parent_id, $attribute, $hidden);

    ?>
    <fieldset>
        <legend style="width: 1000px;">تعديل الوسائط</legend>
        <?php foreach ($rows as $row){ ?>

        <div class="form-group">
            <input type="hidden" value="<?= $row['ID'] ?>" name="id">
            <label for="inputTitle" class="col-lg-2 control-label">العنوان</label>

            <div class="col-lg-6">
                <input type="text" class="form-control" name="title" id="inputTitle" value="<?= $row['TITLE'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">الوصف</label>

            <div class="col-lg-6">
                <textarea class="form-control" name="body" rows="3" id="textArea"><?= $row['DESCRIPTION'] ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputImage" class="col-lg-2 control-label">تحميل صورة</label>

            <div class="col-lg-6">
                <input type="file" value="<?= $row['IMG'] ?>" class="form-control" name="image" id="inputImage">
            </div>
        </div>

        <div class="form-group">
            <label for="keyWords" class="col-lg-2 control-label">URL </label>

            <div class="col-lg-6">
                <input type="text" class="form-control" name="url" id="keyWords" value="<?= $row['URL'] ?>">
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
