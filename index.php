<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require(DIR_WS_INCLUDES . 'template_top.php');
  $content_query = tep_db_query("
    select * from content
    where status = 1 and language_id = '" . $_SESSION['languages_id'] . "' and page_id = 1
    order by id desc
  ");
  $content_array = array();
  while($content = tep_db_fetch_array($content_query)){
    $content_array[] = $content;
  }
?>
<!-- Page Content -->
<div class="container">
  <!-- Marketing Icons Section -->
  <div class="row" style="padding: 10px;">
    <div class="col-lg-12">
      <h3 class="page-header">
        <?php
          echo $content_array[0]['title'];
        ?>
      </h3>
      <p>
        <?php
          echo $content_array[0]['content'];
        ?>
      </p>
    </div>
    <?php
      foreach ($content_array as $value) {
        if($value['id'] != '7' && $value['id'] != '8'){
          echo '
           <div class="col-sd-4 col-md-4" style="padding-right: 10px;">
            <div class="panel panel-default" style="background:none;">
              <div class="panel-heading">
                <h4>' . $value['title'] . '</h4>
              </div>
              <div class="panel-body">
                <p>
                  ' . substr($value['content'] , 0, 200) . '
                </p>
                <a
                  class="btn btn-default"
                  data-toggle="modal"
                  data-target="#' . $value['id'] . '"
                >Read More</a>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div id="' . $value['id'] . '" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">' . $value['title'] . '</h4>
                </div>
                <div class="modal-body">
                  <p>'. $value['content'] .'.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          ';
        }
      }
    ?>
  </div>
  <!-- /.row -->

</div>
<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
