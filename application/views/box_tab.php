    <?php //echo $cat_id;

    $post_count = 0;
    foreach ($rows as $y_rs) {
        if ($post_count == 0) {
            ?>
            <div class="col-r col-lg-7" id="projects" style="margin-top: 15px;">
                <a href="<?php echo base_url('posts/details/' . $y_rs['ID']) ?>" target="_blank"
                   style="color: #888;text-decoration: none;display: inline;">
                <img src="<?= base_url() . $y_rs['IMG'] ?>"
                     style="width: 250px;height: 240px;">
                    </a>

                <h3>
                    <a href="<?php echo base_url('posts/details/' . $y_rs['ID']) ?>" target="_blank"
                       style="color: #888;text-decoration: none;display: inline;">
                    <?= $y_rs['TITLE'] ?>
                </a>
                </h3>


            </div>
            <?php
            $post_count++;
        }
    }
    ?>

    <div class=" col-lg-5" style="margin-top: 15px;">
        <ul class="left_content">
            <?php //echo $cat_id;
            $post_count2 = 0;
            foreach ($rows as $y_res) {
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

