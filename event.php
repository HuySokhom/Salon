<?php
require('includes/application_top.php');
require(DIR_WS_INCLUDES . 'template_top.php');

if($HTTP_GET_VARS['type']){
	$type = $HTTP_GET_VARS['type'];
	$content_query = tep_db_query("
		select * from event
		where type = '" . $type . "'
		order by id asc
	");
}else{
	$content_query = tep_db_query("
		select * from event
		order by id asc
	");
}

?>
  	<!-- Page Content -->
    <div class="container">
		<div class="row">
			<?php require('column_left.php');?>
			<!-- Add the extra clearfix for only the required viewport -->
			<div class="col-sm-9" style="background:none; height:40px; color:#103a71;">
				<h3 style="margin-top:5px; color:#103a71;">
					<?php echo EVENT_AND_PROMOTION;?>
				</h3>
			</div>
		   <div class="col-sm-9" style="margin-top:-1%;">
				<ul class="nav navbar-nav">
					<li><a href="event.php" style="color:#103a71;"><b>All</b></a></li>
					<li><a href="event.php?type=fashion" style="color:#103a71;"><b>Fashion</b></a></li>
					<li><a href="event.php?type=shopping" style="color:#103a71;"><b>Shopping</b></a></li>
					<li><a href="event.php?type=food" style="color:#103a71;"><b>Food & Beverage</b></a></li>
					<li><a href="event.php?type=intertainment" style="color:#103a71;"><b>Intertainment</b></a></li>
					<li><a href="event.php?type=service" style="color:#103a71;"><b>Service</b></a></li>
					<li><a href="event.php?type=other" style="color:#103a71;"><b>Other</b></a></li>
				</ul>
			</div>
		<?php
			while($content = tep_db_fetch_array($content_query)){
				echo '
				<div class="col-md-3">
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
	<hr>
	</div>
	<!-- /.container -->
<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>

