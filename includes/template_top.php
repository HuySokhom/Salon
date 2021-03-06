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
    <link href="ext/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Khmer:400normal|Didact+Gothic:400normal|Open+Sans:400normal|Handlee:400normal|Lato:400normal|Lora:400normal|Roboto:400normal|Nunito:400normal|Montserrat:400normal|Hanuman:400normal|Raleway:400normal&subset=all' rel="stylesheet" type="text/css">
    <link href='ext/css/google_fonts.css' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
    <script src="ext/js/html5shiv.js"></script>
    <script src="ext/js/respond.min.js"></script>
    <script src="ext/js/excanvas.min.js"></script>
<![endif]-->
    <script src="ext/jquery/jquery-1.11.1.min.js"></script>
<!-- font awesome -->
    <link rel="stylesheet" href="ext/css/Font-Awesome-master/css/font-awesome.min.css">
    <?php echo $oscTemplate->getBlocks('header_tags'); ?>
</head>
<body>

  <?php echo $oscTemplate->getContent('navigation'); ?>
  <div id="bodyWrapper" class="<?php echo BOOTSTRAP_CONTAINER; ?>">
    <div class="row">
      <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
      <div
          id="bodyContent"
          class="col-md-9 <?php echo $oscTemplate->getGridContentWidth(); ?> <?php echo ($oscTemplate->hasBlocks
          ('boxes_column_left') ? 'col-md-push-' . $oscTemplate->getGridColumnWidth() : ''); ?>"
      >
