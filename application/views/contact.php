<!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>Contact us</h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  

  <!--MAIN START-->

  <div id="main"> 

    

    <!--CONTACT US START-->

    <section class="contact-section">

      <div class="map-box">

        

        <div class="contact-form padd-tb">

          <div class="container">

            <div class="row">

              <div class="col-md-9 col-sm-8">

                <h2>Get in Touch</h2>

                <form action="<?php echo base_url() ?>home/contact" method="post" enctype="multipart/form-data"> 

                  <div class="row">

                    <div class="col-md-4">

                      <input name="name" required pattern="[a-zA-Z ]+" type="text" placeholder="Name">

                    </div>

                    <div class="col-md-4">

                      <input name="email" required pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$" type="text" placeholder="Email">

                    </div>

                    <div class="col-md-4">

                      <input name="subject" required type="text" placeholder="Subject">

                    </div>

                    <div class="col-md-12">

                      <textarea name="comments" required cols="10" rows="10" placeholder="Comments"></textarea>

                    </div>

                    <div class="col-md-12">

                      <input name="comments" type="submit" value="Submit">

                    </div>

                  </div>

                </form>

              </div>

              <div class="col-md-3 col-sm-4">

                <div class="address-box">

                  <address>

                  <ul>

                    <li> <i class="fa fa-phone"></i> <strong>+234 806 803 4745</strong> <strong>+234 706 152 5786</strong> </li>

                    <li> <i class="fa fa-envelope-o"></i> <a href="mailto:info@axiatag.com">info@axiatag.com</a> </li>

                    <li> <i class="fa fa-globe"></i> <a href="http://axiatag.com">www.axiatag.com</a> </li>

                  </ul>

                  </address>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </section>

    <!--CONTACT US END--> 

    

  </div>

  <!--MAIN END-->