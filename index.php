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
  $image_query = tep_db_query("
    select * from image_slider order by id desc
  ");
  $image_array = array();
  while($image = tep_db_fetch_array($image_query)){
    $image_array[] = $image;
  }

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
  <header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
        foreach( $image_array as $key => $value){
          if($value['sort_order'] === 0){
            echo '<li data-target="#myCarousel" data-slide-to="'. $value['sort_order'] .'" class="active"></li>';
          }else{
            echo '<li data-target="#myCarousel" data-slide-to="'. $value['sort_order'] .'"></li>';
          }
        }
      ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php
        foreach( $image_array as $key => $value){
          $imageName = str_replace(" ", "%20", $value['image']);
          if($value['sort_order'] == 0){
            echo '
              <div class="item active">
                <div class="fill" style="background-image:url('.$imageName.');"> </div>
                <div class="carousel-caption">
                  <h2>Welcome LHT Capital </h2>
                </div>
              </div>
            ';
          }else{
            echo '
              <div class="item">
                <div class="fill" style="background-image:url('.$imageName.');"></div>
                <div class="carousel-caption">
                  <h2>Welcome to LHT Capital</h2>
                </div>
              </div>
            ';
          }
        }
      ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="icon-next"></span>
    </a>
  </header>

  <!-- Page Content -->
  <div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">
          Welcome to LHT Capital
        </h3>

      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">

            <h4> LHT Capital</h4>

          </div>
          <div class="panel-body">
            <div class="animated bounceInDown">
              <p>LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing,marketing,seles;distribution and after-sal support services. </p>
              <p>LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing,marketing,seles;distribution and after-sal support services. </p>
              <p>LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-6">
          <div class="grid">
            <div class="animated zoomIn">
              <figure class="effect-zoe">
                <img src="beauty/ddd.jpg" alt="img14"/ style="width:100%; height:400px;">
                <figcaption>
                  <h3>Lht <span>Capital</span></h3>
                  <span class="icon-heart"></span>
                  <span class="icon-eye"></span>
                  <span class="icon-paper-clip"></span>
                  <p>Welcome to lht beauty.Our Ckients and Customers bdndfit from intergrated </p>
                  <a href="#">View more</a>
                </figcaption>
              </figure>
            </div><!--close animeted zoomin-->
          </div>
        </div><!-- col-lg--->
      </div>
    </div>
  </div>
<!-- /.container -->
<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
