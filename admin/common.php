<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  $id = (int)$HTTP_GET_VARS['ID'];
  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');
  if (tep_not_null($action)) {

    $store_logo = new upload('store_logo');
    $store_logo->set_extensions(array('png', 'gif', 'jpg'));
    $store_logo->set_destination(DIR_FS_CATALOG_IMAGES);
    switch ($action) {
      case 'save':
        if($id){
          tep_db_query("
          update
            common
          set
            content = '". $_POST['content'] ."'
          where
              id = '" . $id . "'"
          );
          if ($store_logo->parse()) {
            if ($store_logo->save()) {
              tep_db_query("
              update
                common
              set
                image = 'images/" . tep_db_input($store_logo->filename) . "'
              where
                  id = '" . $id . "'"
              );
            }
          }
        }else{
          $image = '';
          if ($store_logo->parse()) {
            if ($store_logo->save()) {
              $image = 'images/' . tep_db_input($store_logo->filename);
            }
          }
          tep_db_query("
          insert into
            common
          (
              content,
              image
          )
          values
          (
              '" . $_POST['content'] . "',
              '" . $image . "'
          )
        ");
        }
        $messageStack->add_session('Complete: Save Success.', 'success');
        tep_redirect(tep_href_link(FILENAME_COMMON));
        break;
      case 'delete':
        tep_db_query("
              delete from common where id = '".(int)$id."'
            ");
        $messageStack->add_session('Complete: Delete Success.', 'success');
        tep_redirect(tep_href_link(FILENAME_COMMON));
        break;
    }
  }

  if (!tep_is_writable(DIR_FS_CATALOG_IMAGES)) {
    $messageStack->add(sprintf(ERROR_IMAGES_DIRECTORY_NOT_WRITEABLE, tep_href_link(FILENAME_SEC_DIR_PERMISSIONS)), 'error');
  }

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
  <h2 class="pageHeading">Common Area Information</h2>
<?php
  if($id > 0 || $action == 'add'){
    $store_query_raw = tep_db_query("select * from common where id = '". $id ."'");
    $store = tep_db_fetch_array($store_query_raw);
    echo tep_draw_form('logo', FILENAME_COMMON, 'ID='.$id.'&action=save', 'post', 'enctype="multipart/form-data"');
  ?>
    <button type="submit">Save</button>
    <table width="100%">
      <tr>
          <td valign="top"><b>Content:</b></td>
          <td>
            <textarea name="content" id="content" rows="20">
              <?php echo $store['content'];?>
            </textarea>
          </td>
      </tr>
      <tr>
        <td><b>Image:</b></td>
        <td>
          <?php echo tep_draw_file_field('store_logo');?>
          <br>
          <?php if($store['image']){
              echo '<img src="../' . $store['image'] . '" style="width: 100px;"/>';
            }
          ?>
        </td>
      </tr>
    </table>
  </form>
  <button><a href="common.php">Back</a></button>
  <?php
    }
  else{
  ?>
    <button><a href="common.php?action=add">Add</a></button>
    <br/><br/>
    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
      <tr class="dataTableHeadingRow">
        <td class="dataTableHeadingContent" width="5%">ID</td>
        <td class="dataTableHeadingContent" width="30%">Content</td>
        <td class="dataTableHeadingContent" width="30%">Image</td>
        <td class="dataTableHeadingContent" align="right" width="10%">Action</td>
      </tr>
      <?php
      $content_query_raw = tep_db_query("select * from common order by id desc");
      while ($content = tep_db_fetch_array($content_query_raw)) {
        echo '<tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
              <td class="dataTableContent">' . $content['id'] . '</td>
              <td class="dataTableContent">' . $content['content'] . '</td>
              <td class="dataTableContent">' . $content['image'] . '</td>
              <td class="dataTableContent" style="text-align: right;">
                <a href="common.php?ID=' . $content['id'] . '">
                  <button>Edit</button>
                </a>
                <a href="common.php?ID=' . $content['id'] . '&action=delete">
                  <button>Delete</button>
                </a>
              </td>
          </tr>
        ';
      }
      ?>
    <table>
<?php
  }
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
<!-- TinyMce ditor -->
<script>
  tinymce.init({
    selector:'#content',
    plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
    content_css: [
      '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
      '//www.tinymce.com/css/codepen.min.css'
    ]
  });
</script>
