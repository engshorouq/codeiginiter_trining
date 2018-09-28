<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>لوحة التحكم-شركة توزيع كهرباء محافظات غزة</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="<?= base_url(); ?>/assets/admin/pages/css/tasks-rtl.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?= base_url(); ?>/assets/global/css/components-rtl.css" id="style_components" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url(); ?>/assets/global/css/style-rtl.css" id="style_components" rel="stylesheet"
          type="text/css"/>

    <link href="<?= base_url(); ?>/assets/global/css/plugins-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(); ?>/assets/admin/layout/css/layout-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(); ?>/assets/admin/layout/css/themes/darkblue-rtl.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="<?= base_url(); ?>/assets/admin/layout/css/custom-rtl.css" rel="stylesheet" type="text/css"/>

    <link href="<?= base_url(); ?>/assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet"
          type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet"
          type="text/css"/>
    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
        body{
            font-family: 'Droid Arabic Naskh', serif;
        }
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
<!-- BEGIN HEADER INNER -->
<div class="page-header-inner">
<!-- BEGIN LOGO -->
<div class="page-logo">
    <a href="<?=base_url()?>admin/Main/">
        <img style="margin-top:2px;margin-right: 20px;" src="<?=base_url()?>assets/admin/layout/img/logo-b.png" alt="logo" width="60" height="40" class="logo-default"/>
    </a>

    <div class="menu-toggler sidebar-toggler hide">
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
    </div>
</div>
<!-- END LOGO -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
</a>
<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
<ul class="nav navbar-nav pull-right">

<!-- BEGIN INBOX DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
       data-close-others="true">
        <i class="icon-envelope-open"></i>
					<!--<span class="badge badge-default">
					4 </span>-->
    </a>
    <ul class="dropdown-menu">
        <li class="external">

            <a href="<?=base_url()?>admin/Messages/Messages">عرض الكل</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                <?php $rs=Modules::run('admin/Messages/display_messages');
                $count=0;
                foreach($rs as $data){
                    $count++;
                ?>
                <li>
                    <a href="<?=base_url()?>admin/Messages/Messages">

									<span class="subject">
									<span class="from">
									<?=$data['NAME']?> </span>

									</span>
									<span class="message">
									<?=$data['SUBJECT']?></span>
                    </a>
                </li>
                <?php
                if($count == 6)
                    break;
                } ?>




            </ul>
        </li>
    </ul>
</li>

<!-- BEGIN USER LOGIN DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
       data-close-others="true">
					<span class="username username-hide-on-mobile">
					<?php $username=Modules::run('admin/Users/display_id_current_user');
                    foreach($username as $data){
                        echo $data['FULLNAME'];
                    }?> </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="<?=base_url()?>admin/Users/update_personal_info">
                <i class="icon-user"></i>تحرير الملف الشخصي </a>
        </li>


        <li class="divider">
        </li>
        <li>
            <a href="<?=base_url()?>login/logout">
                <i class="icon-key"></i> تسجيل خروج </a>
        </li>
    </ul>
</li>
</ul>
</div>
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
<!-- BEGIN SIDEBAR MENU -->
<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<ul class="page-sidebar-menu page-sidebar-menu-light select_row" data-keep-expanded="true" data-auto-scroll="true"
    data-slide-speed="200">
<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
</li>
<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
<li class="sidebar-search-wrapper">
</li>
    <?php $rs=Modules::run('admin/Users/user_sys_menus');
   /* foreach($rs as $data){
         echo $data['MENU'];
    }*/

    echo $rs;
    ?>

<!-- BEGIN ANGULARJS LINK -->

<!-- END ANGULARJS LINK -->

</ul>
<!-- END SIDEBAR MENU -->
</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">