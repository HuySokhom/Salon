<?php
require('includes/application_top.php');
require(DIR_WS_INCLUDES . 'template_top.php');

$content_query = tep_db_query("
    select * from content
    where status = 1 and page_id = 4 and  language_id = '" . $_SESSION['languages_id'] . "'
    order by id asc
");
$content_array = array();
while($content = tep_db_fetch_array($content_query)){
    $content_array[] = $content;
}
?>
<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->

    <div class="row">
        <?php require('column_left.php');?>
        <div class="row">
            <div class="col-lg-9 col-sm-9" style="background:none; height:40px; color:#103a71;">
                <h3 style="margin-top:5px;">
                    <?php echo $content_array[0]['title'];?>
                </h3>
            </div>
            <div class="col-lg-9" style="margin-top:1%;">
                <p>
                    <?php echo $content_array[0]['content'];?>
                </p>
            </div>
            <div class="row">
                <?php
                $common_query = tep_db_query("
                    select * from common
                    order by id DESC
                ");
                while($common = tep_db_fetch_array($common_query)){
                    echo '
                    <div class="col-lg-4">
                        <p>
                            ' . $common['content'] . '
                        </p>
                    </div>
                    <div class="col-lg-5" style="margin-top:0.5%;">
                        <a href="#" class="thumbnail">
                            <img src="' . $common['image'] . '" alt="..." style="width:100%; height:250px;">
                        </a>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
        <!-- close row-->
    </div>
    <!-- close row--->
</div>
<!-- /.container -->
<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
