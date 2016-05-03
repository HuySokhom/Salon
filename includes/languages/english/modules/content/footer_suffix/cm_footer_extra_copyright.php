<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_CONTENT_FOOTER_EXTRA_COPYRIGHT_TITLE', 'Copyright Details');
  define('MODULE_CONTENT_FOOTER_EXTRA_COPYRIGHT_DESCRIPTION', 'Adds a Copyright Block to the Extra Footer Area of your site');
  
  define('FOOTER_TEXT_BODY', '<p>Copyright &copy; ' . date('Y')
      . ' <a href="' . tep_href_link(FILENAME_DEFAULT) . '" style="color: #f20420;">'
      . STORE_NAME . '</a>  | All Rights Reserved
      | The UTIP shield is the only <a href="http://myUTIP.com" style="color: #f20420;">Vaginal Hygiene Product</a>
      | <a href="http://CleanVaginaMovement.com" style="color: #f20420;"> Helping Women to End Most Vaginal Infections </a></p>');
  
