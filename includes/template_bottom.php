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
<div class="col-md-3">
    <div class="searchbox-margin">
        <form name="quick_find"
              action="advanced_search_result.php"
              method="get"
              class="form-horizontal"
            >
            <div class="input-group">
                <input type="search" name="keywords" required="" placeholder="Search ..." class="form-control"
                       style="border-radius:0px;">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary" style="border-radius:0px;">
                      <i class="glyphicon glyphicon-search"></i>
                  </button>
                </span>
            </div>
        </form>
    </div>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertising_icon.jpg" class="img-responsive">
    </a>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertising_icon.jpg" class="img-responsive">
    </a>
</div>
<div id="columnRight" class="col-md-3 ads">
    <a href="#">
        <img src="images/ads/advertising_icon.jpg" class="img-responsive">
    </a>
</div>

    </div> <!-- row -->
<div id="columnRight" class="row">
    <a href="#">
        <img src="images/ads/advertise-here-a-748CTP.jpg" class="img-responsive col-md-12" style="margin-bottom: 15px;height:
        100px;width: 100%;">
    </a>
</div>
  </div> <!-- bodyWrapper //-->
  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<script src="ext/jquery/jquery-1.11.1.min.js"></script>
<script src="ext/dropdown.js"></script>
<script src="ext/bootstrap/js/bootstrap.min.js"></script>
<?php echo $oscTemplate->getBlocks('footer_scripts'); ?>
</body>
</html>