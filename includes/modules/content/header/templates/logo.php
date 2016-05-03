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
                . tep_image(DIR_WS_IMAGES . STORE_LOGO, '', '', STORE_NAME, 'style="padding: 20px 0px 20px 0px;"')
                . '</a>';
        ?>
      </div>
      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="http://myutip.com">Home</a>
          </li>
          <li>
            <a href="http://myutip.com/product/">Product</a>
          </li>
          <li>
            <a href="http://myutip.com/clean-vagina-movement/">Clean Vagina Movement</a>
          </li>
          <li>
            <a href="http://myutip.com/about-us/">About Us</a>
          </li>
          <li>
            <a href="http://myutip.com/careers/">Careers</a>
          </li>
          <li>
            <a href="http://myutip.com/contact-us/">Contact Us</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
<?php
if (tep_session_is_registered('customer_id')) {
  echo '<li><a href="' . tep_href_link(FILENAME_LOGOFF, '', 'SSL') . '">' . HEADER_ACCOUNT_LOGOFF . '</a>';
  echo '<li><a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '"><i class="fa fa-user"></i> ' . HEADER_ACCOUNT . '</a>';
}
else {

  ?>
              <li>
                <a href="login.php">
                  <i class="glyphicon glyphicon-log-in"></i>
                  Log In
                </a>
              </li>
              <li>
                <a href="create_account.php">
                  <i class="glyphicon glyphicon-pencil"></i>
                  Register
                </a>
              </li>
  <?php
}
?>
              <li>
                <a href="shopping_cart.php">
                  <i class="fa fa-shopping-cart"></i>
                  Shopping Cart
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
</div>

