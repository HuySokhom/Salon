<?php
require('includes/application_top.php');

if (!isset($HTTP_GET_VARS['id'])) {
    tep_redirect(tep_href_link(FILENAME_DEFAULT));
}
$product_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
$product_check = tep_db_fetch_array($product_check_query);

require(DIR_WS_INCLUDES . 'template_top.php');
?>



<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>


