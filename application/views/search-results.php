 <!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1> Project Search Results</h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  


  

  <!--MAIN START-->

  <div id="main"> 

    <!--SEARCH BAR SECTION START-->

    <section class="candidates-search-bar">

      <div class="container">

        <form action="<?php echo base_url()?>home/search_project" method="post" enctype="multipart/form-data">

          <div class="container">

            <div class="row">

              <div class="col-md-4 col-sm-4">

              

              </div>

              <div class="col-md-4 col-sm-4">

               <input type="text" name="search" placeholder="Search For Projects" required="required">

              </div>

              <div class="col-md-1 col-sm-1">

                 <button type="submit"><i class="fa fa-search"></i></button>

              </div>

              <div class="col-md-3 col-sm-3">

              

              </div>

            </div>

          </div>

        </form>

      </div>

    </section>

    <!--SEARCH BAR SECTION END--> 

    <!--RECENT JOB SECTION START-->

    <section class="recent-row padd-tb">

      <div class="container">

        <div class="row">

          <div class="col-md-9 col-sm-8">

            

            <div id="content-area">

              <h2>Project Search Result</h2>

              <ul id="myList">
<?php if( !empty($project) ) { ?>
                 <?php foreach ($project as $projects){ ?>
                <li>

                  <div class="box">

                    <div class="thumb"><a href="#"><i class="fa fa-tasks fa-5x" aria-hidden="true"></i></a></div>

                    <div class="text-col">
						 <?php $string = $projects['title']; ?>
                      <h4><a href="<?php echo base_url('project/'.$projects['project_id']); ?>"><?php echo $string = character_limiter($string, 50); ?></a></h4>

                      <p><?php echo $projects['category']; ?></p>
                     
                      <a href="<?php echo base_url('home/user/'.$projects['user_id']); ?>" class="text"><i class="fa fa-user"></i><?php echo $projects['username']; ?></a> <a  class="text"> <i class="fa fa-calendar"></i> Posted: <?php  $date = strtotime($projects['date']); ?>
 <?php echo date('j F Y', $date);  ?> </a> <a href="<?php echo base_url('apply/proposal/'.$projects['project_id']); ?>" class="text"> <i class="fa fa-users"></i><?php echo $projects['proposal']; ?> proposal(s) </a> </div>

                    <strong class="price"><i class="fa fa-money"></i> N<?php echo $projects['mini_budget']; ?> - N<?php echo $projects['max_budget']; ?></strong> <br />
                    <div class="clearfix"> </div>
                    <?php 
			
			$text = $projects['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
        
    	<a class="btn-1 btn-color-4 ripple"><?php echo $value; ?></a> 	

 	<?php } ?>
                    </div>

                </li>
<?php }} else{?>
   
   <strong><em><?php echo $search; ?></em></strong>
   
   <?php  } ?> 

                <li>

                  

              </ul>

              

 <div class="col-md-12">
      <div class="row"><?php echo $this->pagination->create_links(); ?></div> 
     </div>

            </div>

          </div>

          <div class="col-md-3 col-sm-4">

          

            <aside>

              <div class="sidebar">

                

                <h2>Featured Projects</h2>

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

              </div>

            </aside>

          </div>

        </div>

      </div>

    </section>

    <!--RECENT JOB SECTION END--> 

  </div>

  <!--MAIN END--> 
    <!--POPULAR JOB CATEGORIES START-->

    

    <!--POPULAR JOB CATEGORIES END--> 
    
