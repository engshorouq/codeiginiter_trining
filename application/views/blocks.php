<?php $result = Modules::run('admin/Apperance/display_apperance'); ?>
<div class="ads col-lg-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="mang-word">
                <img src="<?= base_url(); ?>/assets/global/image/pic1.jpg" width="420" height="200">
            </div>
        </div>
    </div>
    <div class="ads row">
        <div class="ad col-lg-12">


            <?php
            foreach ($result as $row) {
                if ($row['NAME'] == 'advertisement') {
                    $source_id = $row['SOURCE_ID'];
                }
            }?>
            <h2 class="title"> اعلانات</h2><span><a href="<?= base_url() ?>Posts/display_all_post/<?= $source_id ?>" target="_blank"
                                                    class="link_more">المزيد</a></span>
            <?php

            echo Modules::run('Posts/category', $source_id, 'sperate_block', null);?>
        </div>
    </div>


    <div class="ads2 row">
        <div class="ad2 col-lg-12">
            <?php
            foreach ($result as $row) {
                if ($row['NAME'] == 'advertisement') {
                    $source_id = $row['SOURCE_ID']; /*for next block*/
                }
            }?>
            <h2 class="title"> التقارير والاصدارات </h2><span><a
                    href="<?= base_url() ?>Posts/display_all_post/<?= $source_id ?>" target="_blank" class="link_more">المزيد</a></span>
            <?php echo Modules::run('Posts/category', $source_id, 'sperate_block', null); ?>
        </div>
    </div>
    <div class="ads3 row">
        <div class="ad3 col-lg-12">
            <?php
            foreach ($result as $row) {
                if ($row['NAME'] == 'advertisement') {
                    $source_id = $row['SOURCE_ID']; /*for next block*/
                }
            }?>
            <h2 class="title">اجتماعيات </h2><span><a href="<?= base_url() ?>Posts/display_all_post/<?= $source_id ?>"
                                                      target="_blank" class="link_more">المزيد</a></span>
            <?php echo Modules::run('Posts/category', $source_id, 'sperate_block', null); ?>
        </div>

    </div>
    <div class="ads4 row">
        <div class="ad4 col-lg-12">
            <?php
            foreach ($result as $row) {
                if ($row['NAME'] == 'advertisement') {
                    $source_id = $row['SOURCE_ID']; /*for next block*/
                }
            }?>
            <h2 class="title">القائمة البريدية </h2><span><a
                    href="<?= base_url() ?>Posts/display_all_post/<?= $source_id ?>" target="_blank" class="link_more">المزيد</a></span>
            <?php echo Modules::run('Posts/category', $source_id, 'sperate_block', null); ?>
        </div>

    </div>
    <div class="ads5 row">
        <div class="ad5 col-lg-12">
            <h2 class="title">استفتاء </h2>
            <?php
            foreach ($result as $row) {
                if ($row['NAME'] == 'votes') {
                    $source_id = $row['SOURCE_ID']; /*for next block*/
                }

            }
            ?>
            <ul class="main_ad">
                <?php $votes = Modules::run('admin/Votes/display_vote_id',$source_id);

                foreach ($votes as $x_vote) {
                    if ($x_vote['ISPUBLISHED'] == 1) {
                        ?>
                        <h4><?= $x_vote['QUESTION'] ?></h4>
                        <form>


                            <?php $votes_details = Modules::run('admin/Votes_Details/get_vote_details', $x_vote['ID']);
                            foreach ($votes_details as $answer) {
                                ?>
                                <input type="radio" class="control-label" name="votes" id="votes1">
                                <label style="color: #888;" for="votes1"><?= $answer['ANSWER'] ?></label>
                                <br>
                            <?php } ?>
                        </form>
                    <?php
                    }
                }
                ?>


            </ul>
        </div>

    </div>
</div>