
<?php
include('view_header.php');?>
<div class="container-fluid">

    <?php
    $attribute=array('name' => 'formAdd','id' => 'formAdd','class'=>'form-horizontal','enctype' => 'multipart/form-data');
    $hidden=array('is_submit' => 1);
    echo form_open('admin/Posts/display_id/'.$id,$attribute,$hidden);

    ?>
    <fieldset>
        <legend style="width: 1000px;">تعديل المنشور</legend>
        <?php foreach($result as $row){?>
        <div style="position: relative;z-index: 1;">
        <div class="form-group">
            <input type="hidden" value="<?=$row['ID']?>" name="id">
            <label for="inputTitle" class="col-lg-2 control-label">العنوان</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="title" id="inputTitle" value="<?=$row['TITLE']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputImage"  class="col-lg-2 control-label">تحميل صورة</label>
            <div class="col-lg-6">
                <input type="file" value="<?=$row['IMG']?>" class="form-control" name="image" id="inputImage">
            </div>

        </div>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">المحتوى</label>
            <div class="col-lg-6">
                <textarea class="form-control" name="body" rows="6" id="textArea"  ><?=$row['BODY']?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="keyWords" class="col-lg-2 control-label">الكلمات المفتاحية</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="keyword"  value="<?=$row['KEYWORDS']?>" id="keyWords" placeholder="الكلمات المفتاحية">
            </div>
        </div>
        <div class="form-group">
            <label for="writer" class="col-lg-2 control-label">الكاتب </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" value="<?=$row['WRITER']?>" name="writer" id="writer" placeholder="الكاتب ">
            </div>
        </div>

            <div class="form-group">
                <label for="ispublished" class="col-lg-2 control-label">النشر </label>
                <div class="col-lg-6">
                    <select class="form-control"  name="ispublished" id="ispublished">
                        <option <?php if($row['ISPUBLISHED'] == 1) echo 'selected'; ?> value="1">نعم</option>
                        <option <?php if($row['ISPUBLISHED'] == 0) echo 'selected';  ?> value="0">لا</option>
                        </select>
                </div>
            </div>


        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">

                <button type="submit" name="submit" id="submit" class="btn btn-primary">تعديل</button>
                <a class="btn btn-default"<?php if($row['TYPE_CAT'] == 0) {echo  ' href="'.base_url().'admin/Posts/display_cat"';
                    } else{ echo 'href="'.base_url().'admin/Posts/display_pages"'; } ?>>الغاء</a>

            </div>
        </div>
            </div>
        <div style="height:200px;position: absolute;z-index: 2;left: 50px;top: 80px;border: 1px solid #e5e5e5;width: 300px;padding: 10px;">
            <div style="font-weight: bold;font-size: 16px;border-bottom: 1px #e5e5e5 dashed;color: #213540">
                <p>تصنيف الوسائط</p>
            </div>


            <?php $rows =  modules::run('admin/Categories/display_sys_menu_media_up',$row['ID']);

            ?>
            <select name="media" id="media" class="form-control" style="margin-top: 20px;">
                <option value=""></option>
                <?php echo $rows;
                ?>
            </select>



        </div>




    </fieldset>
    <?php
    }
    echo form_close(); ?>

<?php
include('view_footer.php');

?>
