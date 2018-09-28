<?php include('header.php'); ?>

<div class="row" style="margin-top: 10px;">
    <div class="col-lg-8">
        <?php foreach($rows as $data){ ?>
        <div class="post-details">
            <div class="details">
                <span class="date"><i class="glyphicon glyphicon-calendar"></i> <?=$data['PUBLISHEDDATE']?></span>
                <h1><?=$data['TITLE']?></h1>
                <img src="<?=base_url().$data['IMG']?>" alt="<?=$data['TITLE']?>" class="img-responsive">
                <article>
                    <?php if($data['WRITER'] != null){
                        ?>
                        <p>الكاتب:<?=$data['WRITER']?></p>
                    <?php } ?>
                    <?=$data['BODY']?>
                </article>
                <?php
                    if($data['MEDIAID'] != null){
                        $result=Modules::run('admin/Media/display_id_cat',$data['MEDIAID']);
                        ?>
                        <div class="row">
                            <hr>
                        <?php
                        foreach($result as $row){
                            ?>
                            <div>

                                <div data-id="<?php echo $row['ID'] ?>" class="item_box col-sm-3"
                                     style="position:relative;display:inline;background: #e5e5e5;width: 160px;
                                     margin-right:20px;margin-top: 10px;height: 155px;text-align: center;padding: 0px;">
                                    <img src="<?php echo base_url('/' . $row['IMG']); ?>" alt="Post image"
                                         style="width: 100%;height: 100%;padding-bottom: 20px;">
                                    </div>


                                </div>

                        <?php }
                        ?>
                            </div>
                            <?php
                    }
                ?>
                </div>
            </div>
    <?php } ?>
    </div>
    <?php include('blocks.php'); ?>

</div>
<?php include('footer.php'); ?>