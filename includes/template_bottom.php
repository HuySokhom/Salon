<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/
?>

      </div> <!-- bodyContent //-->

<?php
  if ($oscTemplate->hasBlocks('boxes_column_left')) {
?>

      <div id="columnLeft" class="col-md-<?php echo $oscTemplate->getGridColumnWidth(); ?>  col-md-pull-<?php echo $oscTemplate->getGridContentWidth(); ?>">
        <?php echo $oscTemplate->getBlocks('boxes_column_left'); ?>
      </div>

<?php
  }

  if ($oscTemplate->hasBlocks('boxes_column_right')) {
?>

      <div id="columnRight" class="col-md-<?php echo $oscTemplate->getGridColumnWidth(); ?>">
        <?php echo $oscTemplate->getBlocks('boxes_column_right'); ?>
      </div>

<?php
  }
?>
  </div> <!-- bodyWrapper //-->
  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<script src="ext/jquery/jquery-1.11.1.min.js"></script>
<script src="ext/dropdown.js"></script>
<script src="ext/bootstrap/js/bootstrap.min.js"></script>
<?php echo $oscTemplate->getBlocks('footer_scripts'); ?>
<script>
    var selector = "ul .navbar-nav a";
    $(selector).filter(function () {
//        console.log( location.href.replace(/#.*/, "") ); console.log(this.href);
        return this.href == location.href.replace(/#.*/, "");
    }).addClass("active");

</script>
</body>
</html>