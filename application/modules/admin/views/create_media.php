<?php include('view_header.php'); ?>
<div class="container">
    <?php
    $attribute=array('name' => 'formAdd','id' => 'formAdd','class'=>'form-horizontal','enctype' => 'multipart/form-data');
    $hidden=array('is_submit' => 1);
    echo form_open('admin/Media/add_media/'.$id,$attribute,$hidden);
    ?>
    <fieldset>
        <legend style="width: 1000px;">اضافة وسائط</legend>
        <div class="form-group">
            <label for="inputTitle" class="col-lg-2 control-label">العنوان</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="title" id="inputTitle" placeholder="العنوان">
            </div>
        </div>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">الوصف</label>
            <div class="col-lg-6">
                <textarea class="form-control" name="description" rows="10" id="textArea"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputImage" class="col-lg-2 control-label">تحميل صورة</label>
            <div class="col-lg-6">
                <input type="file" class="form-control" name="image" id="inputImage">
            </div>

        </div>


        <div class="form-group">
            <label for="keyWords" class="col-lg-2 control-label">URL </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="url" id="keyWords">
            </div>
        </div>

        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">النشر</label>
            <div class="col-lg-6">
                <select class="form-control" id="select" name="published">
                    <option value="1">نعم</option>
                    <option value="0">لا</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">

                <button type="submit" name="submit" id="submit" class="btn btn-primary">اضافة</button>
                <button type="reset" class="btn btn-default">الغاء</button>

            </div>
        </div>

    </fieldset>
    <?php echo form_close(); ?>
</div>
<?php include('view_footer.php'); ?>