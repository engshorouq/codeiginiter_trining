<?php include('view_header.php'); ?>
<div class="container-fluid">
    <?php
    $attribute = array('name' => 'formAdd', 'id' => 'formAdd', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
    $hidden = array('is_submit' => 1);
    echo form_open('admin/Banners/add_banner', $attribute, $hidden);
    ?>
    <fieldset>
        <legend style="width: 1000px;">ضافة بنر</legend>
        <div style="position: relative;z-index: 1;">

            <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">العنوان</label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="title" id="inputTitle" placeholder="العنوان">
                </div>
            </div>
            <!--<div class="form-group">
                <label for="inputImage" class="col-lg-2 control-label">تحميل صورة</label>

                <div class="col-lg-6">
                    <input type="file" class="form-control" name="image" id="inputImage">
                </div>

            </div>-->
            <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">المدة/باليوم</label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="duration" id="inputDuration" placeholder="المدة">
                </div>
            </div>
            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">المحتوى</label>

                <div class="col-lg-10">
                    <textarea data-richtext="true" class="form-control" name="body" rows="10" id="textArea"></textarea>
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
                <label for="date" class="col-lg-2 control-label">تاريخ النشر</label>

                <div class="col-lg-6">
                    <input type="date" name="date" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-2">

                    <button type="submit" name="submit" id="submit" class="btn btn-primary">اضافة</button>
                    <a href="<?=base_url()?>admin/Banners/" class="btn btn-default">الغاء</a>

                </div>
            </div>
        </div>

</div>

</fieldset>
<?php echo form_close(); ?>
</div>


<?php include('view_footer.php'); ?>

<script>
    /*$(document).ready(function () {

     $('.wysihtml5').wysihtml5({stylesheets: ['<?php //echo base_url('assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css') ?>', '<?php //echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css'); ?>']});
     $("#submit").onclick(function () {

     $("#formAdd").submit();

     });
     });*/
    function getSelectedItemID() {

        return $('ol.dd-list li.dd-item input.checks.checked').val();


    }
</script>