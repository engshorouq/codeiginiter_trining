<?php include('view_header.php'); ?>
<div class="container-fluid">
    <?php
    $attribute = array('name' => 'formAdd', 'id' => 'formAdd', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data');
    $hidden = array('is_submit' => 1);
    echo form_open('admin/Apperance/', $attribute, $hidden);

    $source_id = null;

    ?>

    <fieldset>
        <legend style="width: 1000px;">ادارة المظهر</legend>
        <div class="form-group">
            <label for="news" class="col-lg-2 control-label">السلايدر</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="posts">
                <input type="hidden" name="name_app[]" value="slider">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>
                    <?php
                    /*$source_id=array_filter($rows,function($k){
                       return $k['NAME'] == 'slider';
                    })[0]['SOURCE_ID'];*/
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'slider') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }


                    $rs = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs;
                    ?>
                </select>

            </div>
        </div>

        <div class="form-group">
            <label for="news" class="col-lg-2 control-label">شريط الاخبار</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="posts">
                <input type="hidden" name="name_app[]" value="news">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>

                    <?php
                    /*$source_id=array_filter($rows,function($k){
                        return $k['NAME'] == 'news';
                    })[1]['SOURCE_ID'];*/
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'news') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }
                    $rs2 = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs2;
                    ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="news" class="col-lg-2 control-label">الاعلانات</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="posts">
                <input type="hidden" name="name_app[]" value="advertisement">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>
                    <?php
                    /* $source_id=array_filter($rows,function($k){
                         return $k['NAME'] == 'advertisement';
                     })[2]['SOURCE_ID'];*/
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'advertisement') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }
                    $rs3 = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs3;
                    ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="news" class="col-lg-2 control-label">البنرات</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="banners">
                <input type="hidden" name="name_app[]" value="banner">
                <?php
                foreach ($rows as $data) {
                    if ($data['NAME'] == 'banner') {
                        $source_id = $data['SOURCE_ID'];
                    }
                }
                ?>
                <input type="text" class="source_id" id="source_id_banner" name="source_id[]"
                       style="height: 29px;width: 50px;" value="<?= $source_id ?>">
                <a href="javascript:banner_type();"
                   style="color: #ffffff; margin-right: 10px;"
                   class="btn btn-success glyphicon glyphicon-filter"></a>
            </div>
        </div>
        <div class="form-group">
            <label for="source_id" class="col-lg-2 control-label">الاستفتائات</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="votes">
                <input type="hidden" name="name_app[]" value="votes">
                <?php /*$source_id=array_filter($rows,function($k){
                    return $k['NAME'] == 'votes';
                })[4]['SOURCE_ID'];*/
                foreach ($rows as $data) {
                    if ($data['NAME'] == 'votes') {
                        $source_id = $data['SOURCE_ID'];
                    }
                }

                ?>

                <input type="text" class="source_id" id="source_id" name="source_id[]"
                       style="height: 29px;width: 50px;" value="<?= $source_id ?>">
                <a href="javascript:page_type();"
                   style="color: #ffffff; margin-right: 10px;"
                   class="btn btn-success glyphicon glyphicon-filter"></a>
            </div>
        </div>
        <!-- for bar-tabs -->
        <div class="form-group">
            <label for="source_id" class="col-lg-2 control-label">شريط التاب</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="tab1">
                <input type="hidden" name="name_app[]" value="tabs1">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>
                    <?php
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'tabs1') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }

                    $rs4 = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs4;

                    ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="source_id" class="col-lg-2 control-label">شريط التاب</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="tab2">
                <input type="hidden" name="name_app[]" value="tabs2">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>
                    <?php
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'tabs2') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }

                    $rs5 = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs5;

                    ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="source_id" class="col-lg-2 control-label">شريط التاب</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="tab3">
                <input type="hidden" name="name_app[]" value="tabs3">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>
                    <?php
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'tabs3') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }

                    $rs5 = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs5;

                    ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="source_id" class="col-lg-2 control-label">شريط التاب</label>

            <div class="col-lg-6">
                <input type="hidden" name="type[]" value="tab4">
                <input type="hidden" name="name_app[]" value="tabs4">
                <select class="form-control" id="news" name="source_id[]">
                    <option value=""></option>
                    <?php
                    foreach ($rows as $data) {
                        if ($data['NAME'] == 'tabs4') {
                            $source_id = $data['SOURCE_ID'];
                        }
                    }

                    $rs6 = Modules::run('admin/Categories/display_sys_menu', $source_id);
                    echo $rs6;

                    ?>
                </select>

            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">

                <button type="submit" name="submit" id="submit" class="btn btn-primary">حفظ</button>
                <!--<a href="<?php //echo base_url()?>admin/Banners/" class="btn btn-default">الغاء</a>-->
                <button type="reset" name="reset" id="reset" class="btn btn-default">الغاء</button>

            </div>
        </div>
</div>

</div>

</fieldset>
<?php echo form_close(); ?>
</div>
<div class="modal fade" id="votes_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 400px !important;overflow:visible;">
            <div class="modal-header">


            </div>
            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">
                <?php
                $rs = Modules::run('admin/Votes/display_all');

                ?>
                <table class="table table-hover table-striped table-bordered dataTable"
                       style="margin-top: 5px;">
                    <tr>

                        <th style="width: 30px;">#</th>
                        <th style="width: 35px;"><input type="radio" name="page_id"></th>
                        <th>الاستفتاء</th>
                    </tr>
                    <?php
                    $count = 0;
                    foreach ($rs as $row) {
                        ?>

                        <tr data-id="<?= $row['ID']; ?>">
                            <td style="width: 30px;"><?= ++$count; ?></td>
                            <th style="width: 35px;"><input type="radio" name="page_id" class="page_id"
                                                            value="<?= $row['ID'] ?>"></th>
                            <td><?= $row['QUESTION'] ?></td>
                        </tr>

                    <?php } ?>
                </table>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="banner_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
        <div class="modal-content" style=" height: 400px !important;overflow:visible;">
            <div class="modal-header">


            </div>
            <div class="modal-body" style="margin: 5px;height: 80%;overflow: auto;">
                <?php
                $rs = Modules::run('admin/Banners/display_all');

                ?>
                <table class="table table-hover table-striped table-bordered dataTable"
                       style="margin-top: 5px;">
                    <tr>

                        <th style="width: 30px;">#</th>
                        <th style="width: 35px;"><input type="radio" name="page_id"></th>
                        <th>عنوان البنر</th>
                    </tr>
                    <?php
                    $count = 0;

                    foreach ($rs as $row) {
                        ?>

                        <tr data-id="<?= $row['ID']; ?>">
                            <td style="width: 30px;"><?= ++$count; ?></td>
                            <th style="width: 35px;"><input type="radio" name="banner_id" class="banner_id"
                                                            value="<?= $row['ID'] ?>"></th>
                            <td><?= $row['TITLE'] ?></td>
                        </tr>

                    <?php } ?>
                </table>

            </div>

        </div>
    </div>
</div>
<?php include('view_footer.php'); ?>

<script>
    $('.page_id').click(function () {
        var page_id = $(this).val();

        $('#source_id').val(page_id);
        $('#votes_modal').removeClass('in');
    });
    $('.banner_id').click(function () {
        var page_id = $(this).val();
        $('#source_id_banner').val(page_id);
        $('#banner_modal').removeClass('in');
    });
    function page_type() {
        $('#votes_modal').modal();
    }
    function banner_type() {
        $('#banner_modal').modal();
    }
    function tab_type() {

    }
</script>