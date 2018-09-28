
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
    echo form_open('admin/Users/add_user',$attribute,$hidden);

    ?>
    <fieldset>
        <legend style="width: 1000px;">اضافة مستخدم جديد </legend>



        <div class="form-group">
            <label for="fullName" class="col-lg-2 control-label">الاسم كامل</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="fullName" id="fullName" placeholder="الاسم كامل">
            </div>
        </div>
        <div class="form-group">
            <label for="fullName" class="col-lg-2 control-label">اسم المستخدم </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="username" id="username" placeholder=" اسم المستخدم">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-lg-2 control-label">كلمة السر</label>
            <div class="col-lg-6">
                <input type="password" class="form-control" name="password" id="password" placeholder="كلمة السر">
            </div>
        </div>

        <div class="form-group">
            <label for="conf_password" class="col-lg-2 control-label">تأكيد كلمة السر</label>
            <div class="col-lg-6">
                <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="تأكيد كلمة السر">
            </div>
        </div>
        <?php
        if(isset($error)){
        echo $error;
        }
        ?>
        <div class="form-group">
            <label for="active" class="col-lg-2 control-label"> نشط</label>
            <div class="col-lg-6">

                <select class="form-control" id="active" name="active">
                    <option value="1">نعم</option>
                    <option value="0">لا</option>
                </select>

            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">

                <button type="submit" name="submit" id="submit" class="btn btn-primary">اضافة</button>
                <a href="<?=base_url()?>admin/Users/" class="btn btn-default">الغاء</a>

            </div>
        </div>


    </fieldset>

<?php
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
