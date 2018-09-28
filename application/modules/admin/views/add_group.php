<?php include('view_header.php'); ?>
<div class="container-fluid">
    <?php
    $attribute = array('name' => 'formAdd', 'id' => 'formAdd', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
    $hidden = array('is_submit' => 1);
    echo form_open('admin/Groups/add_group', $attribute, $hidden);
    ?>
    <fieldset>
        <legend style="width: 1000px;">اضافة مجموعة</legend>
        <div style="position: relative;z-index: 1;">

            <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">اسم المجموعة</label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="name" id="inputTitle" placeholder="اسم المجموعة">
                </div>
            </div>
            <!--<div class="form-group">
                <label for="inputImage" class="col-lg-2 control-label">تحميل صورة</label>

                <div class="col-lg-6">
                    <input type="file" class="form-control" name="image" id="inputImage">
                </div>

            </div>-->




            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-2">

                    <button type="submit" name="submit" id="submit" class="btn btn-primary">اضافة</button>
                    <a href="<?=base_url()?>admin/Groups/" class="btn btn-default">الغاء</a>

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