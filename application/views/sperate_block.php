<ul class="main_ad">
    <?php $id = null;
    $count = 0;
    foreach ($rows as $row) {
        $id = $row['ID'];
    }
    //$rs=Modules::run('Posts/display_posts_cat',$id);
    //foreach($rs as $data){
    $data = Modules::run('Posts/display_post', $id);

    foreach ($data as $ydata) {

        ?>

        <li class="litem"><img src="<?php echo base_url('/' . $ydata['IMG']); ?>" style="width: 90px;height: 80px;">
            <h4 class="title2">
                <a href="<?php echo base_url('posts/details/' . $ydata['ID']) ?>" target="_blank"
                   style="color: #888;text-decoration: none;display: inline;">
                    <?php echo $ydata['TITLE']; ?>
                </a>
            </h4>
        </li>

        <?php
        $count++;
        if ($count == 2) {
            break;
        }
    }


    // }
    ?>
</ul>