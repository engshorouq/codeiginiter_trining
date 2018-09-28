<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>شركة توزيع كهرباء محافظات غزة </title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/global/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/global/css/original_css/style.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/global/css/style.css"/>

    <link rel="stylesheet" href="css/normalise.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/global/lib/lib/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/global/lib/lib/bootstrap.css.map">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/global/lib/lib/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/global/lib/lib/bootstrap-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/global/css/breakingNews.css"/>
    <script src="<?= base_url(); ?>assets/global/dist/html5shiv.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/dest/respond.min.js"></script>

    <script src="<?= base_url(); ?>assets/global/js/jQuery.js"></script>
    <script src="<?= base_url(); ?>assets/global/js/breakingNews.js"></script>
    <style>
        /*@import url(http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);*/
        @import url(http://fonts.googleapis.com/earlyaccess/notokufiarabic.css);

        body {
            font-family: 'Noto Kufi Arabic', sans-serif;
            /*font-family: 'Droid Arabic Naskh', serif;*/
        }
    </style>


</head>
<body onload="javascript:startTime();">

<div class="container">
    <div style="width: 1140px;background: #ffffff;">
        <div class="row">
            <div class=""></div>
            <div class="col-lg-12">
                <div class="center">


                    <img src="<?= base_url(); ?>/assets/global/image/logo.jpg" style="width: 1140px;">

                    <div class="bar">
                        <ul style="" id="nav">
                            <li>
                                <div class="home">
                                    <a href="<?=base_url()?>Home/"><span class="glyphicon glyphicon-home"></span>&nbsp; الرئيسية </a>
                                </div>
                            </li>
                            <?php
                            echo Modules::run('Home/display_sys_menu');
                            ?>
                        </ul>
                    </div>

                    <div class="breakingNews" id="bn4">
                        <div class="bn-title"><h2>أخر الأخبار</h2><span></span></div>
                        <ul style="top:-15px;">
                            <?php
                            $source_id='';
                            $result=Modules::run('admin/Apperance/display_apperance');
                                foreach($result as $data){
                                    if($data['NAME'] == 'news'){
                                        $source_id=$data['SOURCE_ID'];
                                    }
                                }
                            $post_details=Modules::run('Posts/display_post', $source_id);

                            foreach($post_details as $row){
                            ?>
                            <li><a href="<?php echo base_url('posts/details/' .$row['ID'])?>" target="_blank"><?=$row['TITLE'] ?></a></li>
                            <?php } ?>

                        </ul>
                        <div class="bn-navi">
                            <span></span>
                            <span></span>
                        </div>
                    </div>