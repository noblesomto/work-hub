<header id="header"> 

    

    <div class="container"> 
    
    <div id="nav-col2">
    <?php if ($this->session->userdata('user_id') == TRUE) {?>
  <a href="<?php echo base_url(); ?>account/index"><i class="fa fa-tachometer"></i> Dashboard</a> | <a href="<?php echo base_url(); ?>account/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>  
  <?php } else { ?>
  <a href="<?php echo base_url(); ?>account/register"> <i class="fa fa-user-plus" aria-hidden="true"></i> Register</a> | <a href="<?php echo base_url(); ?>account/login"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> 
  
  <?php } ?>
    </div>

      <!--NAVIGATION START-->

      <div class="navigation-col">

        <nav class="navbar navbar-inverse">

          <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

            <strong class="logo"><a href="<?php echo base_url(); ?>home/index"><img src="<?php echo base_url(); ?>images/logo.png" alt="AxiaTag"></a></strong> </div>

          <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav" id="nav">

              <li><a href="<?php echo base_url(); ?>home/index">Home</a>  </li>

              <li><a href="<?php echo base_url(); ?>home/about">About Us</a>     

              </li>

              <li><a href="<?php echo base_url(); ?>post/post_project">Post Project</a></li>
              
               <li><a href="<?php echo base_url(); ?>home/freelancer">Freelancer</a></li>

              <li><a href="<?php echo base_url(); ?>home/categories">Categories</a>

                

              </li>

              <li><a href="<?php echo base_url(); ?>home/how">How It Works</a>

                

              </li>

              <li><a href="<?php echo base_url(); ?>home/contact">Contact Us</a></li>

                   

                  </li>

                 

            </ul>

          </div>

        </nav>

      </div>

      <!--NAVIGATION END--> 

    </div>

    

        <!--USER OPTION COLUMN START-->

    
    

  </header>