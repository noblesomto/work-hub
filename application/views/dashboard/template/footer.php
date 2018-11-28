					 </div>
                     <!--footer section start-->
										<footer>
										   <p>© 2017 Axiatag . All Rights Reserved | Designed by  <a href="http://noblecontracts.com/" target="_blank">Noble Contracts</a> </p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?php echo base_url(); ?>home/index"> <span id="logo"> <h1>Axiatag</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->  <?php if( !empty($user) ) {
    foreach($user as $prop) { ?>
    
    <?php $user_id = $_SESSION['user_id']; ?>
							<div class="down">	
									  <a href="<?php echo base_url(); ?>profile/profile/<?php echo $user_id ?>">
             
                                        
                                       <?php if($prop['picture']==''){ ?>
 <img src="<?php echo base_url(); ?>images/user.png" alt="img" h>
 <?php }else{ ?>
 <img src="<?=base_url().'uploads/'.$prop['picture']?>" alt="img"  h>
 <?php } ?>
                                      </a>
<a href="<?php echo base_url(); ?>profile/profile/<?php echo $user_id ?>"><span class=" name-caret"><?php echo $prop['fname']; ?>  <?php echo $prop['lname']; ?></span></a>
									 <p><?php echo $prop['username']; ?></p>
									<ul>
                 <?php }}?>                   
                                
            
		<li><a class="tooltips" href="<?php echo base_url('profile/profile/'.$user_id); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										
		<li><a class="tooltips" href="<?php echo base_url(); ?>account/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
                                    
                                    
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
	<li><a href="<?php echo base_url(); ?>account/index"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
                                        
       <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Projects</span> <span class="fa fa-angle-right" style="float: right"></span></a>
											 <ul id="menu-academico-sub" >
			<li id="menu-academico-boletim" ><a href="<?php echo base_url(); ?>post/post_project">New Project</a></li>
		<li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>post/projects">My Projects</a></li>	  
        </ul>
										 </li>
 
 <li><a href="<?php echo base_url('profile/profile/'.$user_id); ?>"><i class="fa fa-user"></i> <span>My Profile</span></a></li>                                       
	<li id="menu-academico" ><a href="<?php echo base_url(); ?>proposal/proposal"><i class="fa fa-table"></i> <span> My Proposals</span></a>
										   
										</li>
										 
		
<li id="menu-academico" ><a href="<?php echo base_url(); ?>account/payments"><i class="lnr lnr-book"></i> <span>Payments</span></a>
						
									 </li>
<li id="menu-academico" ><a href="<?php echo base_url(); ?>manager/project_list"><i class="fa fa-table"></i> <span>Project Manager</span></a></li>
									 
							  							</ul>
									
									
								
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/vroom.css">


<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script>



</body>
</html>