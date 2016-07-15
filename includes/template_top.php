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
    <link href='//fonts.googleapis.com/css?family=Khmer:400normal|Didact+Gothic:400normal|Open+Sans:400normal|Handlee:400normal|Lato:400normal|Lora:400normal|Roboto:400normal|Nunito:400normal|Montserrat:400normal|Hanuman:400normal|Raleway:400normal&subset=all' rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="ext/jquery/jquery-1.11.1.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></scrip>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background: rgba(204, 204, 204, 0.51);">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="subheader">
            <div id="email" class="pull-right">
                <a href="" style="margin-left:51px; font-size:18px;">ភាសាខ្មែរ</a> | <a href="" style="font-size:18px;">English</a><br />
            </div>
        </div>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php"><img src="images/LHT.png" style="margin-top:-10px; width:100px; height:120px; margin-left:-5%;"></a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div id="wrapper">
                <div id="navmenu">
                    <ul>
                        <li><a href="index.html">Home</a></li>

                        <li><a href="about.html">About Us</a></li>

                        <li style="width:155px;"><a href="companies.html">Group Companies</a></li>

                        <li><a href="team.html">Our Team</a></li>

                        <li><a href="event.html">Event</a></li>

                        <li><a href="training.html">Trading</a></li>

                        <li><a href="career.html">Career</a></li>

                        <li><a href="contact.html">Contact Us</a></li>

                    </ul>

                </div>
            </div><!-- Close Menu -->
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- Header Carousel -->
