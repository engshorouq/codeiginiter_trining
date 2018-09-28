<?php include('view_header.php'); ?>
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                Widget settings form goes here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue">Save changes</button>
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN STYLE CUSTOMIZER -->
<!--<div class="theme-panel hidden-xs hidden-sm">
    <div class="toggler">
    </div>
    <div class="toggler-close">
    </div>
    <div class="theme-options">
        <div class="theme-option theme-colors clearfix">
                    <span>
                    THEME COLOR </span>
            <ul>
                <li class="color-default current tooltips" data-style="default" data-container="body"
                    data-original-title="Default">
                </li>
                <li class="color-darkblue tooltips" data-style="darkblue" data-container="body"
                    data-original-title="Dark Blue">
                </li>
                <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
                </li>
                <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
                </li>
                <li class="color-light tooltips" data-style="light" data-container="body"
                    data-original-title="Light">
                </li>
                <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true"
                    data-original-title="Light 2">
                </li>
            </ul>
        </div>
        <div class="theme-option">
                    <span>
                    Theme Style </span>
            <select class="layout-style-option form-control input-sm">
                <option value="square" selected="selected">Square corners</option>
                <option value="rounded">Rounded corners</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Layout </span>
            <select class="layout-option form-control input-sm">
                <option value="fluid" selected="selected">Fluid</option>
                <option value="boxed">Boxed</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Header </span>
            <select class="page-header-option form-control input-sm">
                <option value="fixed" selected="selected">Fixed</option>
                <option value="default">Default</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Top Menu Dropdown</span>
            <select class="page-header-top-dropdown-style-option form-control input-sm">
                <option value="light" selected="selected">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Sidebar Mode</span>
            <select class="sidebar-option form-control input-sm">
                <option value="fixed">Fixed</option>
                <option value="default" selected="selected">Default</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Sidebar Menu </span>
            <select class="sidebar-menu-option form-control input-sm">
                <option value="accordion" selected="selected">Accordion</option>
                <option value="hover">Hover</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Sidebar Style </span>
            <select class="sidebar-style-option form-control input-sm">
                <option value="default" selected="selected">Default</option>
                <option value="light">Light</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-sm">
                <option value="left" selected="selected">Left</option>
                <option value="right">Right</option>
            </select>
        </div>
        <div class="theme-option">
                    <span>
                    Footer </span>
            <select class="page-footer-option form-control input-sm">
                <option value="fixed">Fixed</option>
                <option value="default" selected="selected">Default</option>
            </select>
        </div>
    </div>
</div>-->
<!-- END STYLE CUSTOMIZER -->
<!-- BEGIN PAGE HEADER-->
<!--<h3 class="page-title">
    Dashboard <small>reports & statistics</small>
</h3>-->
<!--<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-paperclip"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php $rs = Modules::run('admin/Posts/count_posts');
                    foreach ($rs as $row) {
                        echo $row['COUNT(*)'];
                    }
                    ?>
                </div>
                <div class="desc">عدد المنشورات</div>
            </div>
            <a class="more" href="javascript:;">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-camera"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php
                    $rs = Modules::run('admin/Media/count_media');
                    foreach ($rs as $row) {
                        echo $row['COUNT(*)'];
                    }
                    ?>
                </div>
                <div class="desc">عدد الوسائط</div>
            </div>
            <a class="more" href="<?= base_url(); ?>admin/Media/">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php
                    $rs = Modules::run('admin/Users/count_users');
                    foreach ($rs as $row) {
                        echo $row['COUNT(*)'];
                    }
                    ?>
                </div>
                <div class="desc">عدد المستخدمين </div>
            </div>
            <a class="more" href="<?= base_url(); ?>admin/Users/">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">

                    <?php
                    $rs = Modules::run('admin/Hide/count_visitor');
                    foreach ($rs as $row) {
                        echo $row['COUNT(*)'];
                    }
                    ?>
                </div>
                <div class="desc">عدد الزوار</div>
            </div>
            <a class="more" href="javascript:;">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
    <!--<div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
    <!-- <div class="portlet light bg-inverse">
         <div class="portlet-title">
             <div class="caption">
                 <i class="icon-bar-chart font-green-sharp"></i>
                 <span class="caption-subject font-green-sharp ">Site Visits</span>
                 <span class="caption-helper">weekly stats...</span>
             </div>
             <div class="actions">
                 <div class="btn-group btn-group-devided" data-toggle="buttons">
                     <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                         <input type="radio" name="options" class="toggle" id="option1">New</label>
                     <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                         <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                 </div>
             </div>
         </div>
         <div class="portlet-body">
             <div id="site_statistics_loading">
                 <img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
             </div>
             <div id="site_statistics_content" class="display-none">
                 <div id="site_statistics" class="chart">
                 </div>
             </div>
         </div>
     </div>
     <!-- END PORTLET-->
    <!-- </div>-->

    <div class="col-md-12 col-sm-12" style="margin-top:30px;">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bg-inverse">
            <!-- <div class="portlet-title">
                 <div class="caption">
                     <i class="icon-share font-red-sunglo"></i>
                     <span class="caption-subject font-red-sunglo ">Revenue</span>
                     <span class="caption-helper">monthly stats...</span>
                 </div>
                 <div class="actions">
                     <div class="btn-group pull-right">
                         <a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown"
                            data-hover="dropdown" data-close-others="true">
                             Filter Range<span class="fa fa-angle-down">
                                 </span>
                         </a>
                         <ul class="dropdown-menu pull-right">
                             <li>
                                 <a href="javascript:;">
                                     Q1 2014 <span class="label label-sm label-default">
                                         past </span>
                                 </a>
                             </li>
                             <li>
                                 <a href="javascript:;">
                                     Q2 2014 <span class="label label-sm label-default">
                                         past </span>
                                 </a>
                             </li>
                             <li class="active">
                                 <a href="javascript:;">
                                     Q3 2014 <span class="label label-sm label-success">
                                         current </span>
                                 </a>
                             </li>
                             <li>
                                 <a href="javascript:;">
                                     Q4 2014 <span class="label label-sm label-warning">
                                         upcoming </span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>-->
            <div class="portlet-body">
                <div id="site_activities_loading">
                    <!--<img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>-->
                </div>
                <div id="site_activities_content" class="display-none">
                    <div id="site_activities" style="height: 228px;">
                    </div>
                </div>

            </div>
        </div>
        <!-- END PORTLET-->
    </div>

</div>
<div class="clearfix">
</div>
</div>
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
<div class="page-quick-sidebar-wrapper">
<div class="page-quick-sidebar">
<!--<div class="nav-justified">
<ul class="nav nav-tabs nav-justified">
    <li class="active">
        <a href="#quick_sidebar_tab_1" data-toggle="tab">
            Users <span class="badge badge-danger">2</span>
        </a>
    </li>
    <li>
        <a href="#quick_sidebar_tab_2" data-toggle="tab">
            Alerts <span class="badge badge-success">7</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            More<i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>
                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                    <i class="icon-bell"></i> Alerts </a>
            </li>
            <li>
                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                    <i class="icon-info"></i> Notifications </a>
            </li>
            <li>
                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                    <i class="icon-speech"></i> Activities </a>
            </li>
            <li class="divider">
            </li>
            <li>
                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                    <i class="icon-settings"></i> Settings </a>
            </li>
        </ul>
    </li>
</ul>
<!-- <div class="tab-content">
<!--<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
<!--<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
    <h3 class="list-heading">Staff</h3>
    <ul class="media-list list-items">
        <li class="media">
            <div class="media-status">
                <span class="badge badge-success">8</span>
            </div>
            <img class="media-object" src="../../assets/admin/layout/img/avatar3.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Bob Nilson</h4>

                <div class="media-heading-sub">
                    Project Manager
                </div>
            </div>
        </li>
        <li class="media">
            <img class="media-object" src="../../assets/admin/layout/img/avatar1.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Nick Larson</h4>

                <div class="media-heading-sub">
                    Art Director
                </div>
            </div>
        </li>
        <li class="media">
            <div class="media-status">
                <span class="badge badge-danger">3</span>
            </div>
            <img class="media-object" src="../../assets/admin/layout/img/avatar4.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Deon Hubert</h4>

                <div class="media-heading-sub">
                    CTO
                </div>
            </div>
        </li>
        <li class="media">
            <img class="media-object" src="../../assets/admin/layout/img/avatar2.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Ella Wong</h4>

                <div class="media-heading-sub">
                    CEO
                </div>
            </div>
        </li>
    </ul>
    <h3 class="list-heading">Customers</h3>
    <ul class="media-list list-items">
        <li class="media">
            <div class="media-status">
                <span class="badge badge-warning">2</span>
            </div>
            <img class="media-object" src="../../assets/admin/layout/img/avatar6.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Lara Kunis</h4>

                <div class="media-heading-sub">
                    CEO, Loop Inc
                </div>
                <div class="media-heading-small">
                    Last seen 03:10 AM
                </div>
            </div>
        </li>
        <li class="media">
            <div class="media-status">
                <span class="label label-sm label-success">new</span>
            </div>
            <img class="media-object" src="../../assets/admin/layout/img/avatar7.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Ernie Kyllonen</h4>

                <div class="media-heading-sub">
                    Project Manager,<br>
                    SmartBizz PTL
                </div>
            </div>
        </li>
        <li class="media">
            <img class="media-object" src="../../assets/admin/layout/img/avatar8.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Lisa Stone</h4>

                <div class="media-heading-sub">
                    CTO, Keort Inc
                </div>
                <div class="media-heading-small">
                    Last seen 13:10 PM
                </div>
            </div>
        </li>
        <li class="media">
            <div class="media-status">
                <span class="badge badge-success">7</span>
            </div>
            <img class="media-object" src="../../assets/admin/layout/img/avatar9.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Deon Portalatin</h4>

                <div class="media-heading-sub">
                    CFO, H&D LTD
                </div>
            </div>
        </li>
        <li class="media">
            <img class="media-object" src="../../assets/admin/layout/img/avatar10.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Irina Savikova</h4>

                <div class="media-heading-sub">
                    CEO, Tizda Motors Inc
                </div>
            </div>
        </li>
        <li class="media">
            <div class="media-status">
                <span class="badge badge-danger">4</span>
            </div>
            <img class="media-object" src="../../assets/admin/layout/img/avatar11.jpg" alt="...">

            <div class="media-body">
                <h4 class="media-heading">Maria Gomez</h4>

                <div class="media-heading-sub">
                    Manager, Infomatic Inc
                </div>
                <div class="media-heading-small">
                    Last seen 03:10 AM
                </div>
            </div>
        </li>
    </ul>
</div>-->
<!--<div class="page-quick-sidebar-item">
    <div class="page-quick-sidebar-chat-user">
        <div class="page-quick-sidebar-nav">
            <a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
        </div>
        <div class="page-quick-sidebar-chat-user-messages">
            <div class="post out">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Bob Nilson</a>
                    <span class="datetime">20:15</span>
                                        <span class="body">
                                        When could you send me the report ? </span>
                </div>
            </div>
            <div class="post in">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Ella Wong</a>
                    <span class="datetime">20:15</span>
                                        <span class="body">
                                        Its almost done. I will be sending it shortly </span>
                </div>
            </div>
            <div class="post out">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Bob Nilson</a>
                    <span class="datetime">20:15</span>
                                        <span class="body">
                                        Alright. Thanks! :) </span>
                </div>
            </div>
            <div class="post in">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Ella Wong</a>
                    <span class="datetime">20:16</span>
                                        <span class="body">
                                        You are most welcome. Sorry for the delay. </span>
                </div>
            </div>
            <div class="post out">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Bob Nilson</a>
                    <span class="datetime">20:17</span>
                                        <span class="body">
                                        No probs. Just take your time :) </span>
                </div>
            </div>
            <div class="post in">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Ella Wong</a>
                    <span class="datetime">20:40</span>
                                        <span class="body">
                                        Alright. I just emailed it to you. </span>
                </div>
            </div>
            <div class="post out">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Bob Nilson</a>
                    <span class="datetime">20:17</span>
                                        <span class="body">
                                        Great! Thanks. Will check it right away. </span>
                </div>
            </div>
            <div class="post in">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Ella Wong</a>
                    <span class="datetime">20:40</span>
                                        <span class="body">
                                        Please let me know if you have any comment. </span>
                </div>
            </div>
            <div class="post out">
                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>

                <div class="message">
                    <span class="arrow"></span>
                    <a href="javascript:;" class="name">Bob Nilson</a>
                    <span class="datetime">20:17</span>
                                        <span class="body">
                                        Sure. I will check and buzz you if anything needs to be corrected. </span>
                </div>
            </div>
        </div>
        <div class="page-quick-sidebar-chat-user-form">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Type a message here...">

                <div class="input-group-btn">
                    <button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- </div>-->
<!-- <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
 <div class="page-quick-sidebar-alerts-list">
 <h3 class="list-heading">General</h3>
 <ul class="feeds list-items">
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-info">
                         <i class="fa fa-check"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                 Take action <i class="fa fa-share"></i>
                                                 </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 Just now
             </div>
         </div>
     </li>
     <li>
         <a href="javascript:;">
             <div class="col1">
                 <div class="cont">
                     <div class="cont-col1">
                         <div class="label label-sm label-success">
                             <i class="fa fa-bar-chart-o"></i>
                         </div>
                     </div>
                     <div class="cont-col2">
                         <div class="desc">
                             Finance Report for year 2013 has been released.
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col2">
                 <div class="date">
                     20 mins
                 </div>
             </div>
         </a>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-danger">
                         <i class="fa fa-user"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         You have 5 pending membership that requires a quick review.
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 24 mins
             </div>
         </div>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-info">
                         <i class="fa fa-shopping-cart"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         New order received with <span class="label label-sm label-success">
                                                 Reference Number: DR23923 </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 30 mins
             </div>
         </div>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-success">
                         <i class="fa fa-user"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         You have 5 pending membership that requires a quick review.
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 24 mins
             </div>
         </div>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-info">
                         <i class="fa fa-bell-o"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
                                                 Overdue </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 2 hours
             </div>
         </div>
     </li>
     <li>
         <a href="javascript:;">
             <div class="col1">
                 <div class="cont">
                     <div class="cont-col1">
                         <div class="label label-sm label-default">
                             <i class="fa fa-briefcase"></i>
                         </div>
                     </div>
                     <div class="cont-col2">
                         <div class="desc">
                             IPO Report for year 2013 has been released.
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col2">
                 <div class="date">
                     20 mins
                 </div>
             </div>
         </a>
     </li>
 </ul>
 <h3 class="list-heading">System</h3>
 <ul class="feeds list-items">
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-info">
                         <i class="fa fa-check"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                 Take action <i class="fa fa-share"></i>
                                                 </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 Just now
             </div>
         </div>
     </li>
     <li>
         <a href="javascript:;">
             <div class="col1">
                 <div class="cont">
                     <div class="cont-col1">
                         <div class="label label-sm label-danger">
                             <i class="fa fa-bar-chart-o"></i>
                         </div>
                     </div>
                     <div class="cont-col2">
                         <div class="desc">
                             Finance Report for year 2013 has been released.
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col2">
                 <div class="date">
                     20 mins
                 </div>
             </div>
         </a>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-default">
                         <i class="fa fa-user"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         You have 5 pending membership that requires a quick review.
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 24 mins
             </div>
         </div>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-info">
                         <i class="fa fa-shopping-cart"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         New order received with <span class="label label-sm label-success">
                                                 Reference Number: DR23923 </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 30 mins
             </div>
         </div>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-success">
                         <i class="fa fa-user"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         You have 5 pending membership that requires a quick review.
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 24 mins
             </div>
         </div>
     </li>
     <li>
         <div class="col1">
             <div class="cont">
                 <div class="cont-col1">
                     <div class="label label-sm label-warning">
                         <i class="fa fa-bell-o"></i>
                     </div>
                 </div>
                 <div class="cont-col2">
                     <div class="desc">
                         Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                                 Overdue </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col2">
             <div class="date">
                 2 hours
             </div>
         </div>
     </li>
     <li>
         <a href="javascript:;">
             <div class="col1">
                 <div class="cont">
                     <div class="cont-col1">
                         <div class="label label-sm label-info">
                             <i class="fa fa-briefcase"></i>
                         </div>
                     </div>
                     <div class="cont-col2">
                         <div class="desc">
                             IPO Report for year 2013 has been released.
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col2">
                 <div class="date">
                     20 mins
                 </div>
             </div>
         </a>
     </li>
 </ul>
 </div>
 </div>
 <!--<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
     <div class="page-quick-sidebar-settings-list">
         <h3 class="list-heading">General Settings</h3>
         <ul class="list-items borderless">
             <li>
                 Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small"
                                             data-on-color="success" data-on-text="ON" data-off-color="default"
                                             data-off-text="OFF">
             </li>
             <li>
                 Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info"
                                       data-on-text="ON" data-off-color="default" data-off-text="OFF">
             </li>
             <li>
                 Log Errors <input type="checkbox" class="make-switch" checked data-size="small"
                                   data-on-color="danger" data-on-text="ON" data-off-color="default"
                                   data-off-text="OFF">
             </li>
             <li>
                 Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small"
                                           data-on-color="warning" data-on-text="ON" data-off-color="default"
                                           data-off-text="OFF">
             </li>
             <li>
                 Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small"
                                          data-on-color="success" data-on-text="ON" data-off-color="default"
                                          data-off-text="OFF">
             </li>
         </ul>
         <h3 class="list-heading">System Settings</h3>
         <ul class="list-items borderless">
             <li>
                 Security Level
                 <select class="form-control input-inline input-sm input-small">
                     <option value="1">Normal</option>
                     <option value="2" selected>Medium</option>
                     <option value="e">High</option>
                 </select>
             </li>
             <li>
                 Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
             </li>
             <li>
                 Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
             </li>
             <li>
                 Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small"
                                               data-on-color="danger" data-on-text="ON" data-off-color="default"
                                               data-off-text="OFF">
             </li>
             <li>
                 Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small"
                                             data-on-color="warning" data-on-text="ON" data-off-color="default"
                                             data-off-text="OFF">
             </li>
         </ul>
         <div class="inner-content">
             <button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
         </div>
     </div>
 </div>-->
</div>
</div>
<?php include('view_footer.php'); ?>
<script>



    var previousPoint2 = null;
    $('#').hide();
    $('#site_activities_content').show();

    var data1 = [
        <?php
         $rows=Modules::run('admin/Hide/site_char');
         foreach($rows as $data){?>
        [<?=$data['M']?>,<?=$data['COUNT(*)']?>],
        <?php }?>

    ];
    var plot_statistics = $.plot($("#site_activities"),

        [
            {
                data: data1,
                lines: {
                    fill: 0.2,
                    lineWidth: 0
                },
                color: ['#BAD9F5']
            },
            {
                data: data1,
                points: {
                    show: true,
                    fill: true,
                    radius: 4,
                    fillColor: "#9ACAE6",
                    lineWidth: 2
                },
                color: '#9ACAE6',
                shadowSize: 1
            },
            {
                data: data1,
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 3
                },
                color: '#9ACAE6',
                shadowSize: 0
            }
        ],
        {

            xaxis: {
                tickLength: 0,
                tickDecimals: 0,
                mode: "categories",
                min: 0,
                font: {
                    lineHeight: 18,
                    style: "normal",
                    variant: "small-caps",
                    color: "#6F7B8A"
                }
            },
            yaxis: {
                ticks: 5,
                tickDecimals: 0,
                tickColor: "#eee",
                font: {
                    lineHeight: 14,
                    style: "normal",
                    variant: "small-caps",
                    color: "#6F7B8A"
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#eee",
                borderColor: "#eee",
                borderWidth: 1
            }
        });

</script>