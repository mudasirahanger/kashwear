<div id="pagefooter">
  <div class="row-home new-footer" style="padding-top: 50px;">
    <div class="col-half">
      <div class="nav-row">
        <div class="multi-level-nav">
          <div class="tier-1">
            <ul data-menu-handle="footer">
            <?php
              wp_nav_menu( array(
                  'theme_location' => 'footer-menu', // Replace 'primary-menu' with the desired menu location
                  'menu_class' => 'menu-class', // Replace 'menu-class' with your desired CSS class for the menu
              ) );
              ?>
              <!-- <li>
                <a href="/pages/contact-us">Contact Us</a>
              </li>

              <li>
                <a href="/pages/about-us">About Us</a>
              </li>

              <li>
                <a href="/pages/faqs">FAQs</a>
              </li>

              <li>
                <a href="/search">Search</a>
              </li>

              <li>
                <a href="/pages/color-shade-card">Color Shade Card</a>
              </li>

              <li>
                <a href="/pages/terms-and-conditions">Terms and Conditions</a>
              </li>
              <li>
                <a href="/pages/disclaimer">Disclaimer</a>
              </li>
              <li>
                <a href="/pages/delivery-and-returns">Delivery and Returns</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div><!-- /.nav-row -->

    </div>
    <div class="col-half footer-contact">
      <h3> Contact </h3>
      <ul>
        <li>
          <i class="fa fa-envelope"></i>
          <a href="mailto:contact@purekashmir.com"> contact@kashwear.com</a>
        </li>
        <li>
          <i class="fa fa-whatsapp"></i>
          <a href="https://wa.me/123456789">Chat on Whatsapp</a>
        </li>
        <li>
          <i class="fa fa-phone"></i>
          <a href="tel:123456789">+91 123456789</a>
        </li>
      </ul>
    </div>
    <div class="col-half">
      <div class="cf">
        <div class="interact">
          <div class="signup-form-cont">
            <div class="signup-form">
              <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="customer"><input type="hidden" name="utf8" value="✓">

                <input type="hidden" id="contact_tags" name="contact[tags]" value="prospect,newsletter">
                <label for="mailinglist_email">Signup for our newsletters</label>
                <span class="input-block">
                  <input type="email" placeholder="Email Address" class="required" value="" id="mailinglist_email" name="contact[email]"><input class="compact" type="submit" value="Submit">
                </span>
              </form>
            </div>
          </div>
        </div><!-- /.interact -->
        <div class="social-links">
          <ul>
            <li class="facebook"><a href="https://facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="pinterest"><a href="https://pinterest.com/" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li class="instagram"><a href="https://instagram.com/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>