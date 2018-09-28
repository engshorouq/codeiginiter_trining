<?php include('header.php'); ?>
<!--</div>-->

<div class="row news">
<div class="col-lg-8">
<div class="row">
    <?php
    $source_id = '';
    $result = Modules::run('admin/Apperance/display_apperance');

    ?>
    <!-- bar for news-->
    <div class="col-lg-12">
        <?php
        /*$id=array_filter($result,function($k){
            return $k['NAME'] == 'slider';
        })[0]['ID'];*/
        foreach ($result as $data) {
            if ($data['NAME'] == 'slider') {
                $source_id = $data['SOURCE_ID'];
            }
        }

        echo Modules::run('Posts/category', $source_id, 'slide', null);

        ?>
    </div>
</div>

<div class="list row">
    <div class="col-lg-12">
        <ul class="lis">

            <li class="one">
                <i class="glyphicon glyphicon-earphone"></i>

                <p class="title_icon">دعم و مساندة</p>
            </li>
            <li class="two">
                <i class="glyphicon glyphicon-stats"></i>

                <p style="margin-top: 0px;">تقارير و احصائيات</p></li>
            <li class="three">
                <i class="glyphicon glyphicon-tree-deciduous"></i>

                <p>ترشيد الاستهلاك</p>
            </li>
            <li class="four">
                <i class="glyphicon glyphicon-list-alt"></i>

                <p style="margin-top: 0px;"> فواتير الوزارات/المؤسسات</p></li>

        </ul>
    </div>
    <div class="col-lg-12">
        <ul class="lis">

            <li class="five">
                <i class="glyphicon glyphicon-home"></i>

                <p>مركز التدريب </p></li>

            <li class="six">
                <i class="glyphicon glyphicon-book"></i>

                <p>كتاب الزوار </p></li>
            <li class="seven">
                <i class="glyphicon glyphicon-alert"></i>

                <p style="margin-top: 0px;">تبليغ عن مخالفات </p></li>
            <li class="eight">
                <i class="glyphicon glyphicon-blackboard"></i>

                <p style="margin-top: 0px;">الحملات و العروض </p></li>


        </ul>
    </div>


</div>

<div class="projects row">
    <div class="col-lg-12" style="width: auto;">
        <div class="nav2">
            <ul class="nav nav-tabs" id="parent_nav" style="margin: -6px;border: none;font-size: 16px;">
                <?php $count = 0;
                $cat_id = '';
                foreach ($result as $row) {
                    if ($row['NAME'] == 'tabs1') {

                        ?>
                    <li class="<?php if ($count == 0) echo 'active'; ?> item_nav" data-id="<?= $row['SOURCE_ID'] ?>">
                        <?php $cat = Modules::run('admin/Categories/get_data', $row['SOURCE_ID']);
                        foreach ($cat as $cat_data) {
                            ?>
                            <a href="javascript:get_tab(<?= $row['SOURCE_ID'] ?>);"><?= $cat_data['NAME'] ?></a></li>
                        <?php
                        }
                        $count++;

                    } else if ($row['NAME'] == 'tabs2') {
                        ?>
                    <li class="<?php if ($count == 0) echo 'active'; ?> item_nav">
                        <?php $cat = Modules::run('admin/Categories/get_data', $row['SOURCE_ID']);
                        foreach ($cat as $cat_data) {
                            ?>
                            <a href="javascript:get_tab(<?= $row['SOURCE_ID'] ?>);"><?= $cat_data['NAME'] ?></a></li>
                        <?php
                        }
                        $count++;
                    } else if ($row['NAME'] == 'tabs3') {
                        ?>
                    <li class="<?php if ($count == 0) echo 'active'; ?> item_nav">
                        <?php $cat = Modules::run('admin/Categories/get_data', $row['SOURCE_ID']);
                        foreach ($cat as $cat_data) {
                            ?>
                            <a href="javascript:get_tab(<?= $row['SOURCE_ID'] ?>);"><?= $cat_data['NAME'] ?></a></li>
                        <?php
                        }
                        $count++;
                    } else if ($row['NAME'] == 'tabs4') {
                        ?>
                    <li class="<?php if ($count == 0) echo 'active'; ?> item_nav">
                        <?php $cat = Modules::run('admin/Categories/get_data', $row['SOURCE_ID']);
                        foreach ($cat as $cat_data) {
                            ?>
                            <a href="javascript:get_tab(<?= $row['SOURCE_ID'] ?>);"><?= $cat_data['NAME'] ?></a></li>
                        <?php
                        }
                        $count++;
                    }
                    if ($count == 4) {
                        echo '</ul>';
                    }
                    if ($count == 1) {
                        $cat_id = $row['SOURCE_ID'];
                    }
                }
                ?>


                <div id="project">
                    <div id="box_tab">
                        <?php //echo $cat_id;
                        $rs = Modules::run('Posts/display_post', $cat_id);

                        $post_count = 0;
                        foreach ($rs as $y_rs) {
                            if ($post_count == 0) {
                                ?>
                                <div class="col-r col-lg-7" id="projects" style="margin-top: 15px;">
                                    <a href="<?php echo base_url('posts/details/' . $y_rs['ID']) ?>" target="_blank"
                                       style="color: #888;text-decoration: none;display: inline;">
                                        <img src="<?= base_url() . $y_rs['IMG'] ?>"
                                         style="width: 250px;height: 240px;">
                                        </a>

                                    <a href="<?php echo base_url('posts/details/' . $y_rs['ID']) ?>" target="_blank"
                                       style="color: #888;text-decoration: none;display: inline;">
                                    <h3><?= $y_rs['TITLE'] ?></h3>
                                        </a>


                                </div>
                                <?php
                                $post_count++;
                            }
                        }
                        ?>

                        <div class=" col-lg-5" style="margin-top: 15px;">
                            <ul class="left_content">
                                <?php //echo $cat_id;
                                $res = Modules::run('Posts/display_post', $cat_id);
                                $post_count2 = 0;
                                foreach ($res as $y_res) {
                                    if ($post_count2 == 0) {

                                    } else {
                                        ?>

                                        <li>
                                            <a href="<?php echo base_url('posts/details/' . $y_res['ID']) ?>" target="_blank"
                                               style="color: #888;text-decoration: none;display: inline;">
                                            <img src="<?= base_url() . $y_res['IMG'] ?>" width="90"
                                                 height="80">
                                                </a>

                                            <h4>
                                                <a href="<?php echo base_url('posts/details/' . $y_res['ID']) ?>" target="_blank"
                                                   style="color: #888;text-decoration: none;display: inline;">
                                                <?= $y_res['TITLE'] ?>
                                            </a>
                                            </h4>

                                        </li>
                                    <?php
                                    }
                                    $post_count2++;
                                    //echo $post_count2;
                                    if ($post_count2 == 4) {
                                        break;
                                    }
                                }?>

                            </ul>


                        </div>
                        <!-- the content  -->
                    </div>
                </div>
        </div>

    </div>
</div>

<div class="panner row">
    <div class="col-lg-12">
        <img src="<?= base_url(); ?>/assets/global/image/pic1.jpg" height="100" style="margin-top: 10px;">
    </div>
</div>
<div class="pan row">
    <h4>ملتيميديا</h4>

    <div class="col-lg-6" style="margin-top: 20px;">


        <img src="<?= base_url(); ?>/assets/global/image/logo-b.png" style="width: 300px; height: 290px;">
    </div>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>

        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>

        </div>
        <div class="row" style="margin-top: 5px;">

            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url(); ?>/assets/global/image/logo-b.png"
                     style="width: 90px;height: 80px;">
            </div>

        </div>
    </div>
</div>


</div>
<!--- end of col-lg-8-->
<!-- start of col-lg-4 -->
<?php include('blocks.php'); ?>


</div>
<!-- end of news row-->

<?php include('footer.php');
?>
<script>

    function get_tab(id) {

        $('#box_tab').remove();
        get_data('<?php echo base_url('Posts/display_tab')?>', {cat_id: id}, function (data) {

            $('#project').html(data);

        }, 'html');

    }

</script>