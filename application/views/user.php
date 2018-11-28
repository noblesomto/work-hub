<!--INNER BANNER START-->

  <section id="inner-banner">
   <?php if( !empty($user) ) {
    foreach($user as $users) { ?>
    <div class="container">

      <h1><?php echo $users['fname']; ?> <?php echo $users['lname']; ?></h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  

  <!--MAIN START-->

  <div id="main"> 

    <!--RECENT JOB SECTION START-->

    <section class="resumes-section padd-tb">

      <div class="container">

        <div class="row">

          <div class="col-md-9 col-sm-8">

            <div class="resumes-content">

             
              <div class="box">

                <div class="frame"><a href="#">
                
                <?php if($users['picture']==''){ ?>
 <img src="<?php echo base_url(); ?>images/user.png" alt="img" width="150" h>
 <?php }else{ ?>
 <img src="<?=base_url().'uploads/'.$users['picture']?>" alt="img" width="150" h>
 <?php } ?>
                
                </a></div>

                <div class="text-box">

                  <h2><a href="#"></a></h2>

                  <h4><?php echo $users['fname']; ?> <?php echo $users['lname']; ?></h4>

                  <div class="clearfix"> <strong><i class="fa fa-user"></i><?php echo $users['username']; ?></strong> <strong> </strong> </div>

                  <span class="price"><i class="fa fa-star-o" aria-hidden="true"></i>Reviews</span>

<?php 
			
			$text = $users['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
            <a class="mybutton btn-info"><i class="fa fa-tags"></i> <?php  echo  $value;  ?> </a>
    		

 	<?php } ?>
                
                  

                </div>

              </div>
  

              <div class="summary-box">

                <h4>Summary About Me</h4>

                <p>
                <?php echo $users['describe']; ?>
                </p>

             

              </div>

              

  <?php }} ?> 
                        

              

            </div>

          </div>

          <div class="col-md-3 col-sm-4">

            <h2>Featured Projects</h2>

            <aside>

              <div class="sidebar-jobs">
<?php foreach ($featured as $proj): ?>
                  <ul>
					 <?php $string = $proj['title']; ?>
                    <li> <a href="<?php echo base_url('project/'.$proj['project_id']); ?>"><?php echo $string = character_limiter($string, 50); ?></a> <span><?php echo $proj['category']; ?> </span> <span><i class="fa fa-calendar"></i> Posted:<?php  $date = strtotime($proj['date']); ?>
 <?php echo date('j F Y', $date);  ?> </span>
                    
                     <span><i class="fa fa-money"></i>  N<?php echo $proj['mini_budget']; ?> - N<?php echo $proj['max_budget']; ?></span>
                     </li>

                     </ul><hr />

<?php endforeach; ?>
                </div>

            </aside>

          </div>

        </div>

      </div>

    </section>

    <!--RECENT JOB SECTION END--> 

  </div>

  <!--MAIN END--> 