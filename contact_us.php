<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONTACT_US);

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'send') && isset($HTTP_POST_VARS['formid']) && ($HTTP_POST_VARS['formid'] == $sessiontoken)) {
    $error = false;

    $name = tep_db_prepare_input($HTTP_POST_VARS['name']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email']);
    $enquiry = tep_db_prepare_input($HTTP_POST_VARS['enquiry']);

    if (!tep_validate_email($email_address)) {
      $error = true;

      $messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    }

    $actionRecorder = new actionRecorder('ar_contact_us', (tep_session_is_registered('customer_id') ? $customer_id : null), $name);
    if (!$actionRecorder->canPerform()) {
      $error = true;

      $actionRecorder->record(false);

      $messageStack->add('contact', sprintf(ERROR_ACTION_RECORDER, (defined('MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES') ? (int)MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES : 15)));
    }

    if ($error == false) {
      tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, EMAIL_SUBJECT, $enquiry, $name, $email_address);

      $actionRecorder->record();

      tep_redirect(tep_href_link(FILENAME_CONTACT_US, 'action=success'));
    }
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONTACT_US));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
<!-- Page Content -->
<div class="container">

  <!-- Marketing Icons Section -->

  <div class="row" style="margin-top:2px;">
    <div class="col-sm-3">
      <div class="leftHalf">
        <!-- facbook --->
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLucky-Salon-Spa-280393978778604%2F%3Ffref%3Dts&tabs=timeline&width=350&height=225&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="280" height="200" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        <!-- close facbook-->
        <!--- video ---->
        <div class="embed-responsive embed-responsive-16by9">
          <object width="425" height="400">
            <param name="movie" value="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"></param>
            <param name="allowFullScreen" value="true"></param>

            <embed src="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" style="top:14%; width:100%; height:150px;">
            </embed>
          </object>

        </div><!--close embed-responsive-16by9--->
        <div class="embed-responsive embed-responsive-16by9">
          <object width="425" height="400">
            <param name="movie" value="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"></param>
            <param name="allowFullScreen" value="true"></param>

            <embed src="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" style="top:12%; width:100%; height:150px;">
            </embed>
          </object>

        </div><!--close embed-responsive-16by9--->
        <!-- close video ---->

        <a href="#" class="thumbnail" style="margin-top:10%;">
          <img src="images/common area.jpg" alt="..." style="width:100%; height:124px;">
        </a>
        <a href="#" class="thumbnail">
          <img src="images/common area.jpg" alt="..." style="width:100%; height:124px;">
        </a>
        <a href="#" class="thumbnail">
          <img src="images/common area.jpg" alt="..." style="width:100%; height:124px;">
        </a>

      </div>
    </div>
    <!-- Add the extra clearfix for only the required viewport -->
    <div class="row">
    <div class="col-sm-4">
      <h3>Contact Details</h3>
      <p>
        <?php echo nl2br(STORE_ADDRESS); ?>
      </p>
      <p><i class="fa fa-phone"></i>
        <abbr title="Phone">Tel</abbr>: <?php echo STORE_PHONE; ?></p>
      <p><i class="fa fa-envelope-o"></i>
        <abbr title="Email">E-mail</abbr>:
        <a href="mailto:<?php echo STORE_OWNER_EMAIL_ADDRESS; ?>"><?php echo STORE_OWNER_EMAIL_ADDRESS; ?></a>
      </p>

      <!-- For success/fail messages -->
      <button type="submit" class="btn btn-primary">Open with map</button>
      <h3 style="color:red;">Business hours</h3>
      <p><i class="fa fa-clock-o"></i>
        <abbr title="Hours">H</abbr>: Monday - Sunday: 8:00 AM to 9:00 PM</p>

    </div>

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

    <div class="col-sm-5">
      <?php echo tep_draw_form('contact_us', tep_href_link(FILENAME_CONTACT_US, 'action=send'), 'post', 'class="form-horizontal"', true); ?>
      <h3>E-mail</h3>
        <div class="">
          <div class="controls">
            <label>Name:</label>
            <input
                type="text"
                class="form-control"
                id="inputFromName"
                required
                data-validation-required-message="Please enter your name."
            >
            <p class="help-block"></p>
          </div>
        </div>
        <div class="">
          <div class="controls">
            <label>Email Address:</label>
            <input type="email" class="form-control" id="inputFromEmail" required data-validation-required-message="Please enter your email address.">
          </div>
        </div>
        <div class="">
          <div class="controls">
            <label>Message:</label>
            <textarea rows="2" cols="100" class="form-control"  id="inputEnquiry" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
          </div>
        </div>
        <br>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-4" style="margin-top:2%;">
        <a href="#" class="thumbnail">
          <img src="images/lucky mall.jpg" alt="..." style="width:100%; height:250px;">
        </a>
      </div>
      <!-- Map Column -->
      <div class="col-md-5" style="margin-top:2%;">
        <!-- Embedded Google Map -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15527.238826322044!2d103.8552592!3d13.3621056!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe144b495cd2a8758!2sLucky+Mall!5e0!3m2!1skm!2skh!4v1465948779875" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

      </div>
      <!-- Contact Details Column -->
    </div>
    </div>
  </div><!-- close row--->
  <hr>
</div><!-- /.container -->
<?php
//  if ($messageStack->size('contact') > 0) {
//    echo $messageStack->output('contact');
//  }
//
//  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'success')) {
//?>
<!---->
<!--<div class="contentContainer">-->
<!--  <div class="contentText">-->
<!--    <div class="alert alert-info">--><?php //echo TEXT_SUCCESS; ?><!--</div>-->
<!--  </div>-->
<!---->
<!--  <div class="pull-right">-->
<!--    --><?php //echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'glyphicon glyphicon-chevron-right', tep_href_link(FILENAME_DEFAULT)); ?>
<!--  </div>-->
<!--</div>-->
<!---->
<?php
//  } else {
//?>

<?php //echo tep_draw_form('contact_us', tep_href_link(FILENAME_CONTACT_US, 'action=send'), 'post', 'class="form-horizontal" style="display:none;"', true); ?>
<!---->
<!--<div class="contentContainer">-->
<!--  <div class="contentText">-->
<!--  -->
<!--    <p class="inputRequirement text-right">--><?php //echo FORM_REQUIRED_INFORMATION; ?><!--</p>-->
<!--    <div class="clearfix"></div>-->
<!---->
<!--    <div class="form-group has-feedback">-->
<!--      <label for="inputFromName" class="control-label col-sm-3">--><?php //echo ENTRY_NAME; ?><!--</label>-->
<!--      <div class="col-sm-9">-->
<!--        --><?php
//        echo tep_draw_input_field('name', NULL, 'required autofocus="autofocus" aria-required="true" id="inputFromName" placeholder="' . ENTRY_NAME . '"');
//        echo FORM_REQUIRED_INPUT;
//        ?>
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group has-feedback">-->
<!--      <label for="inputFromEmail" class="control-label col-sm-3">--><?php //echo ENTRY_EMAIL; ?><!--</label>-->
<!--      <div class="col-sm-9">-->
<!--        --><?php
//        echo tep_draw_input_field('email', NULL, 'required aria-required="true" id="inputFromEmail" placeholder="' . ENTRY_EMAIL . '"', 'email');
//        echo FORM_REQUIRED_INPUT;
//        ?>
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group has-feedback">-->
<!--      <label for="inputEnquiry" class="control-label col-sm-3">--><?php //echo ENTRY_ENQUIRY; ?><!--</label>-->
<!--      <div class="col-sm-9">-->
<!--        --><?php
//        echo tep_draw_textarea_field('enquiry', 'soft', 50, 15, NULL, 'required aria-required="true" id="inputEnquiry" placeholder="' . ENTRY_ENQUIRY . '"');
//        echo FORM_REQUIRED_INPUT;
//        ?>
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!---->
<!--  <div class="buttonSet">-->
<!--    <div class="text-right">--><?php //echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'glyphicon glyphicon-send', null, 'primary', null, 'btn-success'); ?><!--</div>-->
<!--  </div>-->
<!--</div>-->
<!--</form>-->
<!---->
<?php
//  }

  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
