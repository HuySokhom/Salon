<?php
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
                image_slider
              set
                text = '". $_POST['text'] ."',
                sort_order = '". $_POST['sort_order'] ."',
                image_view = '". $_POST['page_view'] ."'
              where
                  id = '" . $id . "'"
              );
              if ($store_logo->parse()) {
                if ($store_logo->save()) {
                  tep_db_query("
                  update
                    image_slider
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
                image_slider
              (
                  text,
                  sort_order,
                  image_view,
                  image
              )
              values
              (
                  '" . $_POST['text'] . "',
                  '" . $_POST['sort_order'] . "',
                  '" . $_POST['page_view'] . "',
                  '" . $image . "'
              )
            ");
            }
            $messageStack->add_session('Complete: Save Success.', 'success');
            break;
        case 'delete':
            tep_db_query("
              delete from image_slider where id = '".(int)$id."'
            ");
            $messageStack->add_session('Complete: Delete Success.', 'success');
            tep_redirect(tep_href_link(FILENAME_IMAGE_SLIDER));
            break;
    }
  }

  if (!tep_is_writable(DIR_FS_CATALOG_IMAGES)) {
    $messageStack->add(sprintf(ERROR_IMAGES_DIRECTORY_NOT_WRITEABLE, tep_href_link(FILENAME_SEC_DIR_PERMISSIONS)), 'error');
  }

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
  <h2 class="pageHeading">Image Slider</h2>
<?php
  if($id > 0 || $action == 'add'){

  if($action == 'delete'){
      echo '<button><a href="image_slider.php">Back</a></button>';
      echo tep_draw_form('logo', FILENAME_IMAGE_SLIDER, 'ID='.$id.'&action=delete', 'post', 'enctype="multipart/form-data"');
      echo 'Delete This Image?<button type="submit">Yes</button></form>';
  }else{
    $store_query_raw = tep_db_query("select * from image_slider where id = '". $id ."'");
    $store = tep_db_fetch_array($store_query_raw);
    echo tep_draw_form('logo', FILENAME_IMAGE_SLIDER, 'ID='.$id.'&action=save', 'post', 'enctype="multipart/form-data"');
  ?>
    <button type="submit">Save</button>
    <table width="100%">
      <tr>
          <td><b>Title:</b></td>
          <td><input type="text" name="text" value="<?php echo $store['text'];?>"/></td>
      </tr>
      <tr>
        <td><b>Sort Order:</b></td>
        <td>
          <input type="text" name="sort_order" value="<?php echo $store['sort_order'];?>"/>
        </td>
      </tr>
      <tr>
        <td><b>Image Left View:</b></td>
        <td>
          <select name="page_view">
              <option value="">--select--</option>
              <option value="Yes" <?php echo $store['image_view'] === 'Yes' ? 'selected' : '' ?>>Yes</option>
              <option value="No" <?php echo $store['image_view'] === 'No' ? 'selected' : '' ?>>No</option>
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
  <button><a href="image_slider.php">Back</a></button>
  <?php
    }
    }else{
  ?>
    <button><a href="image_slider.php?action=add">Add</a></button>
    <br/><br/>
    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
      <tr class="dataTableHeadingRow">
        <td class="dataTableHeadingContent" width="5%">ID</td>
        <td class="dataTableHeadingContent" width="20%">Title</td>
        <td class="dataTableHeadingContent" width="30%">Image</td>
        <td class="dataTableHeadingContent" width="20%">Sort Order</td>
        <td class="dataTableHeadingContent" width="10%">Image left</td>
        <td class="dataTableHeadingContent" align="right" width="15%">Action</td>
      </tr>
      <?php
      $content_query_raw = tep_db_query("select * from image_slider order by sort_order asc");
      while ($content = tep_db_fetch_array($content_query_raw)) {
        echo '<tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
              <td class="dataTableContent">' . $content['id'] . '</td>
              <td class="dataTableContent">' . $content['text'] . '</td>
              <td class="dataTableContent">' . $content['image'] . '</td>
              <td class="dataTableContent">' . $content['sort_order'] . '</td>
              <td class="dataTableContent">' . $content['image_view'] . '</td>
              <td class="dataTableContent"><a href="image_slider.php?ID=' . $content['id'] . '"><button>Edit</button></a>
                <a href="image_slider.php?ID=' . $content['id'] . '&action=delete"><button>Delete</button></a>
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
