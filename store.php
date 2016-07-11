<?php
require('includes/application_top.php');
require(DIR_WS_INCLUDES . 'template_top.php');

if($HTTP_GET_VARS['type']){
	$type = $HTTP_GET_VARS['type'];
	$content_query = tep_db_query("
		select * from store_directory
		where type = '" . $type . "'
		order by id asc
	");
}else{
	$content_query = tep_db_query("
		select * from store_directory
		order by id asc
	");
}

?>
  	<!-- Page Content -->
    <div class="container">
		<div class="row" style="margin-top:2px;">
		<?php require('column_left.php');?>
		<div class="col-sm-9">
		<div class="row">
			<!-- Add the extra clearfix for only the required viewport -->
			<div class="col-sm-12" style="background:none; height:40px; color:#103a71;">
				<h3 style="margin-top:5px; color:#103a71;">
					<?php echo STORE_DIRECTORY;?>
				</h3>
			</div>
		   <div class="col-sm-12" style="margin-top:-1%;">
			<ul class="nav navbar-nav">
				<li><a href="store.php" style="color:#103a71;"><b>All</b></a></li>
				<li><a href="store.php?type=fashion" style="color:#103a71;"><b>Fashion</b></a></li>
				<li><a href="store.php?type=shopping" style="color:#103a71;"><b>Shopping</b></a></li>
				<li><a href="store.php?type=food" style="color:#103a71;"><b>Food & Beverage</b></a></li>
				<li><a href="store.php?type=intertainment" style="color:#103a71;"><b>Intertainment</b></a></li>
				<li><a href="store.php?type=service" style="color:#103a71;"><b>Service</b></a></li>
				<li><a href="store.php?type=other" style="color:#103a71;"><b>Other</b></a></li>
			</ul>

			</div>
			<?php
				while($content = tep_db_fetch_array($content_query)){
					echo '
					<div class="col-md-4">
						<div class="grid">
							<figure class="effect-zoe">
								<img
									class="img-responsive img-portfolio img-hover"
									src="'.$content['image'].'"
								>
								<figcaption style="width:100%;">
									<h3>'. $content['title'] .'</h3>
								</figcaption>
							</figure>
						</div>
					</div>
					';
				}
			?>
		</div>
</div><!-- /.container -->

<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>

