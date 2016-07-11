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
            event
          set
            title = '". $_POST['title'] ."',
            type = '". $_POST['type'] ."'
          where
              id = '" . $id . "'"
          );
          if ($store_logo->parse()) {
            if ($store_logo->save()) {
              tep_db_query("
              update
                event
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
            event
          (
              title,
              type,
              image
          )
          values
          (
              '" . $_POST['title'] . "',
              '" . $_POST['type'] . "',
              '" . $image . "'
          )
        ");
        }
        $messageStack->add_session('Complete: Save Success.', 'success');
        tep_redirect(tep_href_link(FILENAME_EVENT));
        break;
      case 'delete':
        tep_db_query("
              delete from event where id = '".(int)$id."'
            ");
        $messageStack->add_session('Complete: Delete Success.', 'success');
        tep_redirect(tep_href_link(FILENAME_EVENT));
        break;
    }
  }

  if (!tep_is_writable(DIR_FS_CATALOG_IMAGES)) {
    $messageStack->add(sprintf(ERROR_IMAGES_DIRECTORY_NOT_WRITEABLE, tep_href_link(FILENAME_SEC_DIR_PERMISSIONS)), 'error');
  }

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
  <h2 class="pageHeading">Event and Promotion</h2>
<?php
  if($id > 0 || $action == 'add'){
    $store_query_raw = tep_db_query("select * from event where id = '". $id ."'");
    $store = tep_db_fetch_array($store_query_raw);
    echo tep_draw_form('logo', FILENAME_EVENT, 'ID='.$id.'&action=save', 'post', 'enctype="multipart/form-data"');
  ?>
    <button type="submit">Save</button>
    <table width="100%">
      <tr>
          <td><b>Title:</b></td>
          <td><input type="text" name="title" value="<?php echo $store['title'];?>"/></td>
      </tr>
      <tr>
        <td><b>Type:</b></td>
        <td>
          <select name="type">
            <option value="">--Select--</option>
            <option value="fashion" <?php echo $store['type'] === 'fashion' ? 'selected' : '' ?> >Fashion</option>
            <option value="shopping" <?php echo $store['type'] == 'shopping' ? 'selected' : '' ?> >Shopping</option>
            <option value="food"  <?php echo $store['type'] === '=food' ? selected : '' ?> >Food and Beverage</option>
            <option value="intertainment" <?php echo $store['type'] === 'intertainment' ? selected : '' ?> >Intertainment</option>
            <option value="service" <?php echo $store['type'] === 'service' ? selected : '' ?> >Service</option>
            <option value="other" <?php echo $store['type'] === 'other' ? selected : '' ?> >Other</option>
          </select>
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
  <button><a href="event.php">Back</a></button>
  <?php
    }
  else{
  ?>
    <button><a href="event.php?action=add">Add</a></button>
    <br/><br/>
    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
      <tr class="dataTableHeadingRow">
        <td class="dataTableHeadingContent" width="5%">ID</td>
        <td class="dataTableHeadingContent" width="30%">Title</td>
        <td class="dataTableHeadingContent" width="30%">Image</td>
        <td class="dataTableHeadingContent" width="20%">Type</td>
        <td class="dataTableHeadingContent" align="right" width="10%">Action</td>
      </tr>
      <?php
      $content_query_raw = tep_db_query("select * from event order by id desc");
      while ($content = tep_db_fetch_array($content_query_raw)) {
        echo '<tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
              <td class="dataTableContent">' . $content['id'] . '</td>
              <td class="dataTableContent">' . $content['title'] . '</td>
              <td class="dataTableContent">' . $content['image'] . '</td>
              <td class="dataTableContent">' . $content['type'] . '</td>
              <td class="dataTableContent">
                <a href="event.php?ID=' . $content['id'] . '">
                  <button>Edit</button>
                </a>
                <a href="event.php?ID=' . $content['id'] . '&action=delete">
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
