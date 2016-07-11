    <?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  $oscTemplate->buildBlocks();

  if (!$oscTemplate->hasBlocks('boxes_column_left')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }

  if (!$oscTemplate->hasBlocks('boxes_column_right')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
<head>
    <meta charset="<?php echo CHARSET; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>">
    <meta name="description" content="<?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>">
    <meta name="author" content="Huy Sokhom">
    <meta property="og:title" content="<?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>">
    <title><?php echo tep_output_string_protected($oscTemplate->getTitle()); ?></title>
    <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
    <link rel="shortcut icon" href="images/LHT_Logo.jpg">
    <link href="ext/css/bootstrap.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Khmer:400normal|Didact+Gothic:400normal|Open+Sans:400normal|Handlee:400normal|Lato:400normal|Lora:400normal|Roboto:400normal|Nunito:400normal|Montserrat:400normal|Hanuman:400normal|Raleway:400normal&subset=all' rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="ext/css/font-awesome.css">
<!--[if lt IE 9]>
    <script src="ext/js/html5shiv.js"></script>
    <script src="ext/js/respond.min.js"></script>
    <script src="ext/js/excanvas.min.js"></script>
<![endif]-->
    <script src="ext/jquery/jquery-1.11.1.min.js"></script>
    <link href="ext/css/style.css" rel="stylesheet">
    <?php echo $oscTemplate->getBlocks('header_tags'); ?>
    <link href="ext/css/hover.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="ext/css/half-slider.css" rel="stylesheet">
</head>
<body style="background:#ddd;">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="subheader">
            <div id="email" class="pull-right" style=" margin-top:3px;">
                <a href="about.php" style="font-size:18px;"><?php echo ABOUT_US;?> &nbsp;</a>
                | &nbsp;<a href="contact_us.php" style="font-size:18px;"><?php echo CONTACT_US;?></a>
                <br /><br/>
                <form class="navbar-form pull-right">
                    <a href="index.php?language=kh" style=" margin-left:0; font-size:18px;">ខ្មែរ</a>
                    |
                    <a href="index.php?language=en" style="font-size:18px;">English</a>
                    </button>
                </form>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /

  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <img src="images/LUCKYMALL_LOGO_FINAL.png" style="margin-top:-95%; width:110px; height:120px; margin-left: 35%;">
        </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href=""><?php echo HOME;?> &nbsp;&nbsp;&nbsp;</a></li>
            <li><a href="store.php"><?php echo STORE_DIRECTORY;?> &nbsp;&nbsp;&nbsp;</a></li>
            <li><a href="event.php"><?php echo EVENT_AND_PROMOTION;?> &nbsp;&nbsp;&nbsp;</a></li>
            <li><a href="common.php"><?php echo COMMON_AREA_INFORMAION;?> &nbsp;&nbsp;&nbsp;</a></li>
            <li><a href="career.php"><?php echo CARRER;?></a></li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Portfolio Item Row -->
<div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php
        $image_query_raw = tep_db_query("select * from image_slider where image_view = 'No' order by sort_order asc");
        while ($image = tep_db_fetch_array($image_query_raw)) {
            $active = $image['sort_order'] == 0 ? "active"  : "";
            echo '
                <div class="item '. $active .'">
                    <img class="img-responsive" src="'. $image['image'] .'" style=" width:100%;">
                </div>
            ';
        }
        ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

</div>
