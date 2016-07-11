<?php
require('includes/application_top.php');
?>
<?php
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<h2  class="pageHeading">Content Managements</h2>
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
                    <td class="dataTableContent"><a href="content.php?ID='. $content['id'] .'"><button>Edit</button></a></td>
                </tr>
              ';
          }
        ?>
</table>
<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>