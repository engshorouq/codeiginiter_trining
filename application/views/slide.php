
<div id="myslide" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#myslide" data-slide-to="0" class="active"></li>
        <li data-target="#myslide" data-slide-to="1"></li>
        <li data-target="#myslide" data-slide-to="2"></li>
        <li data-target="#myslide" data-slide-to="3"></li>
        <li data-target="#myslide" data-slide-to="4"></li>
        <li data-target="#myslide" data-slide-to="5"></li>

    </ol>
    <div class="carousel-inner" role="listbox">
        <?php $id = null;
        $count = 0;
        foreach ($rows as $row) {
            $id = $row['ID'];
        }

            $data = Modules::run('Posts/display_post', $id);


            foreach ($data as $ydata) {


                ?>


                <div class="item <?php if ($count == 0) echo "active"; ?>">
                    <img src="<?php echo base_url('/' . $ydata['IMG']); ?>" alt="img1"
                         style="width: 800px;height: 400px;">

                    <div class="carousel-caption ">
                        <di class="div_slide">
                            <p class="title_slide">
                                <a href="<?php echo base_url('posts/details/' .$ydata['ID'])?>" target="_blank" style="color: #ffffff;text-decoration: none;"> <?php echo $ydata['TITLE']; ?></a>
                            </p>
                        </di>
                    </div>
                </div>
                <?php
                $count++;
                if ($count == 6) {
                    break;
                }

            }


        //}
        ?>
    </div>

</div>

