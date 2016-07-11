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
	<div class="col-sm-3"> 
		<div class="leftHalf">
		<!-- facbook --->
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLucky-Salon-Spa-280393978778604%2F%3Ffref%3Dts&tabs=timeline&width=350&height=225&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="280" height="200" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		<!-- close facbook-->
		<!--- video ---->
	 	<div class="embed-responsive embed-responsive-16by9">
			<object width="425" height="400">
				<param name="movie" value="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"/>
				<param name="allowFullScreen" value="true"/>

				<embed src="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" style="top:14%; width:100%; height:150px;">
				</embed>
			</object>
		</div><!--close embed-responsive-16by9--->
		<div class="embed-responsive embed-responsive-16by9">
			<object width="425" height="400">
				<param name="movie" value="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"/>
				<param name="allowFullScreen" value="true"/>

				<embed src="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" style="top:12%; width:100%; height:150px;">
				</embed>
			</object>
       </div><!--close embed-responsive-16by9--->
	<!-- close video ---->
	
        <a href="#" class="thumbnail" style="margin-top:10%;">
      <img src="images/common area.jpg" alt="Responsive image" style="width:100%; height:124px;">
    </a>
	<a href="#" class="thumbnail">
      <img src="images/common area.jpg" alt="Responsive image" style="width:100%; height:124px;">
    </a>
        <a href="#" class="thumbnail">
      <img src="images/common area.jpg" alt="Responsive image" style="width:100%; height:124px;">
    </a>
	
  </div>
</div>
  <!-- Add the extra clearfix for only the required viewport -->
	<div class="col-sm-9" style="background:none; height:40px; color:#103a71;">
		<h3 style="margin-top:5px; color:#103a71;">
			<?php echo STORE_DIRECTORY;?>
		</h3>
	</div>
   <div class="col-sm-9" style="margin-top:-1%;"> 
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
</div><!-- /.container -->

<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>

