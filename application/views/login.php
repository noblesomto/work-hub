<!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>Login To Your Account</h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  

  <!--MAIN START-->

  <div id="main"> 

    

    <!--SIGNUP SECTION START-->

    <section class="signup-section">

      <div class="container">

        <div class="holder">

          <div class="thumb"><i class="fa fa-sign-in fa-5x" aria-hidden="true"></i></div>

          <?php echo form_open('account/login'); ?>
          <?php echo  $this->session->flashdata('login_msg'); ?>
          <?php echo  $this->session->flashdata('verify'); ?>

            <div class="input-box"> <i class="fa fa-user"></i>

              <input type="email" placeholder="Email" name="email" value="<?php echo set_value('email') ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-unlock"></i>

              <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password') ?>" required>

            </div>

            <div class="check-box">

                <a href="#" class="login">Forgot your Password</a>
                 </div>

            <input type="submit" value="Login">

            

            

          </form>

        </div>

      </div>

    </section>

    <!--SIGNUP SECTION END--> 

    

  </div>

  <!--MAIN END-->