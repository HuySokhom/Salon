<div id="storeLogo" class="col-sm-<?php echo $content_width; ?>">
  <nav class="navbar header-style navbar-inverse navbar-fixed-top" role="navigation" style="background: #ffffff;border: 0px;">
    <div class="container">
      <div class="navbar-header">
        <button
            type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            style="background: #ddd;border: 1px;">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php
            echo '<a href="' . tep_href_link('index.php') . '">'
                . tep_image(DIR_WS_IMAGES . STORE_LOGO, '', '', STORE_NAME)
                . '</a>';
        ?>
      </div>
      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="">Khmer</a>
          </li>
          <li>
            <a href="">English</a>
          </li>
        </ul>
        <div>
          <input type="text" class="form-control" placeholder="Search..." />
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="about_us.php">About Us</a>
          </li>
          <li>
            <a href="service.php">Our Service</a> 
          </li>
          <li>
            <a href="">Products</a>
          </li>
          <li>
            <a href="">Experts</a>
          </li>
          <li>
            <a href="">Contact Us</a>
          </li>
          <li class="dropdown">
            <a href="">Career</a>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
</div>

