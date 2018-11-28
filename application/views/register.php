 <!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>Register Your Account</h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  

  <!--MAIN START-->

  <div id="main"> 

    

    <!--SIGNUP SECTION START-->

    <section class="signup-section">

      <div class="container">

        <div class="holder">

          <div class="thumb"><i class="fa fa-user-plus fa-5x" aria-hidden="true"></i></div>

          <?php echo form_open('account/register') ?>
    <?php echo $this->session->flashdata('msg'); ?>
     <?php echo $this->session->flashdata('verify'); ?>

            <div class="input-box"> <i class="fa fa-pencil"></i>

              <input type="text" placeholder="First Name" name="fname" value="<?php echo set_value('fname'); ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-pencil-square-o"></i>

              <input type="text" placeholder="Last Name" name="lname" value="<?php echo set_value('lname'); ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-envelope-o"></i>
				<span class="text-danger"><?php echo form_error('email'); ?></span>
              <input type="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-user"></i>
			<span class="text-danger"><?php echo form_error('username'); ?></span>
              <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-unlock"></i>

              <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-unlock"></i>

              <input type="password" placeholder="Confirm Password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" required>

            </div>

            <div class="input-box"> <i class="fa fa-phone"></i>

              <input type="text" placeholder="Phone" name="phone" value="<?php echo set_value('phone'); ?>" required>

            </div>
            
            <div class="select-box">

              <div class="selector">

                <select class="full-width" name="user">

                  <option value="freelancer">Freelancer</option>

                  <option value="employer">Employer</option>

                  <option value="both">Both</option>

                

                </select>

              </div>

            </div>

            

            

            <div class="check-box">

              <input id="id3" type="checkbox" required />

              <strong>I’ve read <a href="#">Terms</a> &amp; <a href="#">Conditions</a></strong> </div>

            <input type="submit" value="Sign up">

            <em>Already a Member? <a href="<?php echo base_url(); ?>account/login">LOG IN NOW</a></em>

          </form>

        </div>

      </div>

    </section>

    <!--SIGNUP SECTION END--> 

    

  </div>

  <!--MAIN END--> 
<script src="<?php echo base_url(); ?>js/jquery.noconflict.js"></script> 

<script src="<?php echo base_url(); ?>js/theme-scripts.js"></script> 