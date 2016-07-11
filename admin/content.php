<?php
require('includes/application_top.php');
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<h2  class="pageHeading">Content Managements</h2>
<?php
    $id = (int)$HTTP_GET_VARS['ID'];
    $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');
    if (tep_not_null($action)) {
        switch ($action) {
            case 'save':
                tep_db_query("
                    update
                      content
                    set
                      title = '" . $_POST['title'] . "', content = '" .$_POST['content']. "'
                    where
                        id = '" . $id . "'"
                );
                $messageStack->add_session('Complete: Update Success.', 'success');
        break;
        }
    }
    if($id > 0){
        $content_query_raw = tep_db_query("select * from content where id = '". $id ."'");
        $content = tep_db_fetch_array($content_query_raw);
    ?>
        <a href="content.php">
            <button>Back</button>
        </a>
        <?php
            echo tep_draw_form('save', FILENAME_CONTENT, 'ID='. $id  .'&&action=save', 'POST');
        ?>
            <button type="submit">Save</button>
            <table width="100%">
                <tr>
                    <td>
                        <b>Id:</b>
                    </td>
                    <td>
                        <?php echo $content['id']?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Title:</b>
                    </td>
                    <td>
                        <input type="text" name="title" style="width: 500px;" value="<?php echo $content['title']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Content:</b>
                    </td>
                    <td>
                        <textarea name="content" rows="20" id="content">
                            <?php echo $content['content']?>
                        </textarea>
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }else {
        ?>
        <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
        <tr class="dataTableHeadingRow">
            <td class="dataTableHeadingContent" width="5%">ID</td>
            <td class="dataTableHeadingContent" width="30%">Title</td>
            <td class="dataTableHeadingContent" width="60%">Content</td>
            <td class="dataTableHeadingContent" align="right" width="5%">Action</td>
        </tr>
        <?php
        $content_query_raw = tep_db_query("select * from content order by id desc");
        while ($content = tep_db_fetch_array($content_query_raw)) {
            echo '<tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
                    <td class="dataTableContent">' . $content['id'] . '</td>
                    <td class="dataTableContent">' . $content['title'] . '</td>
                    <td class="dataTableContent">' . $content['content'] . '</td>
                    <td class="dataTableContent"><a href="content.php?ID=' . $content['id'] . '"><button>Edit</button></a></td>
                </tr>
              ';
        }
    }
?>
</table>
<?php
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
