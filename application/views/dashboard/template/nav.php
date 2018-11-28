   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						        <div class="main-search">
											<form>
											   <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
												<input type="submit" value="">
											</form>
									<div class="close"><img src="images/cross.png" /></div>
								</div>
									<div class="srch"><button></button></div>
									<script type="text/javascript">
										 $('.main-search').hide();
										$('button').click(function (){
											$('.main-search').show();
											$('.main-search text').focus();
										}
										);
										$('.close').click(function(){
											$('.main-search').hide();
										});
									</script>
							<!--/profile_details-->
								<div class="profile_details_left">
									<ul class="nofitications-dropdown">
											
									       <li class="dropdown note">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge">new</span></a>

												
													<ul class="dropdown-menu two first">
														<li>
															<div class="notification_header">
																<h3>Messages  </h3> 
															</div>
														</li>
                                                         <?php foreach ($message as $mess): ?>
														<li><a href="<?php echo base_url(); ?>account/view_message/<?php echo $mess['slug'] ?>">
														   <div class="user_img"><img src="<?php echo base_url(); ?>images/1.jpg" alt=""></div>
                                                          
                                                           
														   <div class="notification_desc">
															<p><?php echo $mess['title'] ?></p>
															<p><span><?php  $date = strtotime($mess['date']); ?>
 <?php echo date('j F Y', $date);  ?></span></p>
															</div>
                                                           
                                                           
														   <div class="clearfix"></div>	
														 </a></li>
                                                          <?php endforeach; ?>
														 
														<li>
															<div class="notification_bottom">
																<a href="<?php echo base_url(); ?>account/messages">See all messages</a>
															</div> 
														</li>
													</ul>
										</li>
										
								
								   							   		
							<div class="clearfix"></div>	
								</ul>
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
						<div class="outter-wp">