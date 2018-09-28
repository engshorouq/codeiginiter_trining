<?php include('header.php'); ?>

    <div class="row" style="margin-top: 10px;">
        <div class="col-lg-8">
            <div class="post-details">
                <div class="details">
                    <?php foreach ($rows as $row) { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="<?=base_url('posts/details/' .$row['ID'])?>" class="link_post" target="_blank">
                                <img class="thumbnail" src="<?= base_url() . $row['IMG'] ?>" style="width: 100;height: 90px;display: inline;">
                                <span style="font-size: 16px; margin-right: 10px;"><?= $row['TITLE'] ?></span>
                                    </a>
                            </div>
                        </div>
                        <hr>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include('blocks.php'); ?>

    </div>
<?php include('footer.php'); ?>