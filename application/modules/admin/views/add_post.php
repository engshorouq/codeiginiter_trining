<?php include('view_header.php'); ?>
<div class="container-fluid">
    <?php
    $attribute = array('name' => 'formAdd', 'id' => 'formAdd', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
    $hidden = array('is_submit' => 1);
    echo form_open('admin/Posts/add_post', $attribute, $hidden);
    ?>
    <fieldset>
        <legend style="width: 1000px;">اضافة منشور</legend>
        <div style="position: relative;z-index: 1;">
            <!-- hidden field for type of post 0 classification and 1 paging  -->
            <input type="hidden" class="form-control" name="type_cat" id="type_cat" value="0">

            <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">العنوان</label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="title" id="inputTitle" placeholder="العنوان">
                </div>
            </div>
            <div class="form-group">
                <label for="inputImage" class="col-lg-2 control-label">تحميل صورة</label>

                <div class="col-lg-6">
                    <input type="file" class="form-control" name="image" id="inputImage">
                </div>

            </div>
            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">المحتوى</label>

                <div class="col-lg-6">
                    <!--data-richtext="true"-->
                    <textarea class=" form-control" name="body" rows="10" id="textArea"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="keyWords" class="col-lg-2 control-label">الكلمات المفتاحية</label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="keyword" id="keyWords"
                           placeholder="الكلمات المفتاحية">
                </div>
            </div>
            <div class="form-group">
                <label for="writer" class="col-lg-2 control-label">الكاتب </label>

                <div class="col-lg-6">
                    <input type="text" class="form-control" name="writer" id="writer" placeholder="الكاتب ">
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
                    <a href="<?=base_url()?>admin/Posts/display_cat" class="btn btn-info">الغاء</a>

                </div>
            </div>
        </div>

        <div style="overflow:scroll;height:270px;position: absolute;z-index: 2;left: 50px;top: 75px;border: 1px solid #e5e5e5;width: 300px;padding: 10px;">
          <div style="font-weight: bold;font-size: 16px;border-bottom: 1px #e5e5e5 dashed;color: #213540">
            <p>التصنيفات</p>
              </div>


            <?php $rows =  modules::run('admin/Categories/display');
                    echo $rows;
            ?>


        </div>
        <div style="height:250px;position: absolute;z-index: 2;left: 50px;top: 350px;border: 1px solid #e5e5e5;width: 300px;padding: 10px;">
            <div style="font-weight: bold;font-size: 16px;border-bottom: 1px #e5e5e5 dashed;color: #213540">
                <p>تصنيف الوسائط</p>
            </div>


            <?php $rows =  modules::run('admin/Categories/display_sys_menu_media');
            ?>
            <select name="media" id="media" class="form-control" style="margin-top: 20px;">
                <option value=""></option>
                <?php echo $rows;
                ?>
            </select>



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