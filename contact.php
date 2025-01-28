<?php include('header2.php'); ?>



      <!-- Example row of columns -->
      <div class="row">
      	<div class="col-md-12">
        <h2>Contact Us</h2>
            <!-- EXTRACT FORM HERE =======> -->
    <!--<div class="container">-->
      <div id="contact_form" class="row">
        <div class="col-md-6">
          
          <p>Please fill in the below form and we will get back to you.</p>
          <form role="form" id="feedbackForm"><div id="success-message"></div>
            <div class="form-group has-feedback">
              <label class="control-label" for="name">Name</label>
              <input type="text" class="form-control input-sm" id="name" name="name" placeholder="Enter your name" />
              <span class="help-block" style="display: none;">Please enter your name.</span>
            </div>
            <!-- UNCOMMENT HERE IF YOU WANT TITLE, COMPANY AND WEBSITE FIELDS - you must also uncomment values in $fields_req in sendmail.php
            <div class="form-group">
              <label class="control-label" for="title">Title</label>
              <input type="text" class="form-control input-sm optional" id="title" name="title" />
            </div>
            <div class="form-group">
              <label class="control-label" for="company">Company</label>
              <input type="text" class="form-control input-sm optional" id="company" name="company" />
            </div>
            <div class="form-group">
              <label class="control-label" for="website">Website</label>
              <input type="url" class="form-control input-sm optional" id="website" name="website" />
            </div>
            -->
            <div class="form-group has-feedback">
              <label class="control-label" for="phone">Phone</label>
              <input type="tel" class="form-control input-sm optional" id="phone" name="phone" placeholder="Enter your phone (Optional)"/>
              <span class="help-block" style="display: none;">Please enter a valid phone number.</span>
            </div>
            <div class="form-group has-feedback">
              <label class="control-label" for="email">Email Address</label>
              <input type="email" class="form-control input-sm" id="email" name="email" placeholder="Enter your email" />
              <span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
            </div>
            <div class="form-group has-feedback">
              <label class="control-label" for="message">Message*</label>
              <textarea rows="5" cols="30" class="form-control input-sm" id="message" name="message" placeholder="Enter your message" ></textarea>
              <span class="help-block" style="display: none;">Please enter a message.</span>
            </div>
            <img id="captcha" src="library/vender/securimage/securimage_show.php" alt="CAPTCHA Image" />
            <a href="#" onclick="document.getElementById('captcha').src = 'library/vender/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Show a Different Image</a><br/>
            <div class="form-group has-feedback" style="margin-top: 10px;">
              <label class="control-label" for="captcha_code">Text Within Image</label>
              <input type="text" class="form-control input-sm" name="captcha_code" id="captcha_code" placeholder="For security, please enter the code displayed in the box." />
              <span class="help-block" style="display: none;">Please enter the code displayed within the image.</span>
            </div>
            <span class="help-block" style="display: none;">Please enter a the security code.</span>
            <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg" data-loading-text="Sending..." style="display: block; margin-top: 10px;">Submit</button>
          </form>
        </div><!--/span-->
      </div><!--/row-->
      <hr>
   <!-- </div>/.container-->
    <!-- <======= UP TO HERE -->
        </div>
          
      </div>
 <script src="assets/js/contact-form.js"></script>
      <!-- Site footer -->
<?php
include('footer.php');
?>